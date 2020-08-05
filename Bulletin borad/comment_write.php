<?php
require_once ('db_conf.php');

$commName    = $_POST['commName'];
$commContent = $_POST['commContent'];
//$commPasswd  = password_hash($_POST['commPasswd'], PASSWORD_DEFAULT);
$board_id    = $_POST['board_id'];

$mysql = "INSERT INTO mybulletin VALUES (0, '$board_id', '$commName', 0, '', '$commContent', 0, now())";
$conn = connectDB();
$result = $conn->query($mysql);
echo "<script>location.href='view.php?board_id=$board_id';</script>";
?>

