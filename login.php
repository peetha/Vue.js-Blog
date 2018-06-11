<?php
session_status();

$conn = new mysqli("localhost", "root", "Ikon@1234!", "blog");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$res = array('error' => false);

$username = $_POST['username'];
$password = $_POST['password'];
if ($username == '') {
  $res['error'] = true;
  $res['message'] = "Username is required";
} else if ($password == '') {
  $res['error'] = true;
  $res['message'] = "Password is required";
} else {
  $sql = "SELECT * FROM `users` WHERE `usrname` = '$username' AND `password` = '$password'";
  $query = $conn->query($sql);
  if ($query->num_rows > 0) {
    $row = $query->fetch_array();
    $_SESSION['user'] = $row['id'];     // $row['userid'];
    $res['message'] = "Login successful";

  } else {
    $res['error'] = true;
    $res['message'] = "Login failed. Wrong username or password";
  }

}

$conn->close();
header("Content-type: application/json");
echo json_encode($res);
die();
