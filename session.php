<?php
session_start();
$conn = new mysqli("localhost", "root", "Ikon@1234!", "blog");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
  header('location:http://localhost:8080/');
}

$sql="select * from users where id='".$_SESSION['user']."'";
$query=$conn->query($sql);
$row=$query->fetch_array();

?>
