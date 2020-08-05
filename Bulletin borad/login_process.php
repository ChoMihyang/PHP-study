<?php
require_once 'db_conf.php';

// 아이디, 패스워드 유효성 확인
$mysql = "SELECT * FROM user_info WHERE id = '{$_POST['id']}' AND password = '{$_POST['password']}'";
$conn = connectDB();
$result = $conn->query($mysql);

if(!$result){
    echo "Connect Query Failed";
    exit(-1);
}
$row = $result->fetch_assoc();

if(!$row){
    echo "<script>alert('아이디나 비밀번호를 재확인 바랍니다.'); history.back()</script>";
}else{
    session_start();

    $_SESSION['login']      = true;
    $_SESSION['userName']   = $row['name'];
    $_SESSION['userId']     = $row['id'];

    echo "<script>alert('로그인이 완료되었습니다.'); location.href = 'list.php';</script>";
}
?>
