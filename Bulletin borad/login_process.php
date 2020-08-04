<?php
require_once ('db_conf.php');

// 아이디, 패스워드 유효성 확인
$mysql = "SELECT * FROM user_info WHERE id = '{$_POST['id']}' AND password = '{$_POST['password']}'";

$result = $conn->query($mysql);
if(!$result){
    echo "Connect Query Failed";
    exit(-1);
}
$row = $result->fetch_assoc();

if(!$row){
    echo "로그인에 실패하였습니다.<br><br>";
    echo "<button onclick = history.back()>다시 입력하기</button>";
}else{
    session_start();

    $_SESSION['userGrade']  = $row['grade'];
    $_SESSION['userName']   = $row['name'];
    $_SESSION['userAge']    = $row['age'];

    echo "성공적으로 로그인 하였습니다.<br><br>";
    echo "<button onclick = userInfo()>회원정보보기</button>";
}
?>

<script>
    function userInfo(){ location.href = 'main.php'; }
</script>
