<?php
require_once('db_conf.php');

$name       = $_POST['name'];
$password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
$title      = $_POST['title'];
$content    = $_POST['content'];

$mysql = "INSERT INTO mybulletin VALUES (0, 0, '$name', '$password', '$title', '$content', 0, now())";
$conn = connectDB();
$result = $conn->query($mysql);
//if($result){
//    echo "연결 성공";
//}else echo "연결 실패";
?>
<script>location.href = 'list.php';</script>

