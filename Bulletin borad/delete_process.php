<?php
session_start();
require_once ('db_conf.php');

$board_id       = $_POST['board_id'];
$commBoard_id   = $_GET['board_id'];
$commBoard_pid  = $_GET['board_pid'];

// DB 내 저장된 해시화한 비밀번호 조회 목적
$mysql = "SELECT user_name FROM mybulletin WHERE board_id=";
// 게시물 조회 쿼리문인지 댓글 조회 쿼리문인지 구별
$mysql = ($commBoard_pid > 0 ? $mysql.$commBoard_id." AND board_pid=".$commBoard_pid : $mysql.$board_id);
$conn = connectDB();
$result = $conn->query($mysql);
$row = $result->fetch_array();

if($_SESSION['userId'] === $row['user_name']) {
    $mysql = "DELETE FROM mybulletin WHERE board_id=";
// 게시물 삭제 쿼리문인지 댓글 삭제 쿼리문인지 구별
    $mysql = ($commBoard_pid > 0 ? $mysql . $commBoard_id . " AND board_pid=" . $commBoard_pid : $mysql . $board_id);
    $conn = connectDB();
    $result = $conn->query($mysql);

    echo "<script>alert('삭제가 완료되었습니다.')</script>";
    echo "<script>location.href='list.php';</script>";
}else{
    echo "<script>alert('접근할 수 없는 계정입니다.')</script>";
}
// 비밀번호 일치 검사
// 일치할 경우 : 해당 게시글 삭제 처리
// 일치하지 않을 경우 : 경고문 메시지 출력

/*if(password_verify($password, $row[0])){
    $mysql = "DELETE FROM mybulletin WHERE board_id=";
    // 게시물 삭제 쿼리문인지 댓글 삭제 쿼리문인지 구별
    $mysql = ($commBoard_pid > 0 ? $mysql.$commBoard_id." AND board_pid=".$commBoard_pid : $mysql.$board_id);
    $conn = connectDB();
    $result = $conn->query($mysql);

    echo "<script>alert('삭제가 완료되었습니다.')</script>";
    echo "<script>location.href='list.php';</script>";
}else{
    echo "<script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>";
}*/
