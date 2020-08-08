<?php
session_start();
require_once ('db_conf.php');

$board_id = $_GET['board_id'];

$name       = $_POST['name'];
$password   = $_POST['password'];
$title      = $_POST['title'];
$content    = $_POST['content'];

$mysql = "SELECT user_name FROM mybulletin WHERE board_id = $board_id";
$conn = connectDB();
$result = $conn->query($mysql);
$row = $result->fetch_array();

if($_SESSION['userId'] === $row['user_name']) {
    $mysql = "UPDATE mybulletin SET user_name = '$name', title = '$title', content = '$content',
              reg_date = now() WHERE board_id = $board_id";
    $conn = connectDB();
    $result = $conn->query($mysql);
    echo "<script>location.href='list.php';</script>";
}else{
    echo "<script>alert('접근할 수 없는 계정입니다.');history.back();</script>";
}
?>

