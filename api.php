<?php
header('Access-Control-Allow-Origin: *');
$conn = new mysqli("localhost", "root", "Ikon@1234!", "blog");
if ($conn->connect_error) {
  die("Database connection established Failed..");
}

/*echo ($_GET['post_id']);
die("sadas");*/
  $res = array('error' => false);
$action = 'read';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

if ($action == 'read' & !isset($_GET['post_id'])) {
  $result = $conn->query("SELECT * FROM `posts`");
  $posts = array();
  while ($row = $result->fetch_assoc()){
    array_push($posts, $row);
  }
  $res['posts'] = $posts;
}

if (isset($_GET['post_id'])) {
  $id = $_GET['post_id'];

  $result = $conn->query("SELECT * FROM `posts` WHERE `id` = '$id' ");
  if ($result) {
    $post = array();//$row = $result->fetch_assoc();
    $res['post'] = $result->fetch_assoc();

  }
}
//var_dump($res);
//var_dump($res/*['posts']*/);

/*if ($action == 'create') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $result = $conn->query("INSERT INTO `users` (`username`, `email`, `mobile`) VALUES ('$username', '$email', '$mobile') ");
  if ($result) {
    $res['message'] = "User Added successfully";
  } else{
    $res['error'] = true;
    $res['message'] = "Insert User fail";
  }
}
if ($action == 'update') {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $result = $conn->query("UPDATE `users` SET `username` = '$username', `email` = '$email', `mobile` = '$mobile'WHERE `id` = '$id'");
  if ($result) {
    $res['message'] = "User Updated successfully";
  } else{
    $res['error'] = true;
    $res['message'] = "User Update failed";
  }
}
if ($action == 'delete') {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $result = $conn->query("DELETE FROM `users` WHERE `id` = '$id'");
  if ($result) {
    $res['message'] = "User deleted successfully";
  } else{
    $res['error'] = true;
    $res['message'] = "User delete failed";
  }
}*/
$conn -> close();
//$res = array_map('utf8_encode', $res);
//echo iconv(mb_detect_encoding(), "UTF-8", $res);
//echo iconv(mb_detect_encoding($res, mb_detect_order(), true), "UTF-8", $res);
header("Content-type: application/json");
echo json_encode($res);
die();
?>
