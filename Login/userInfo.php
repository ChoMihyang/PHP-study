<?php
    require_once ('db_conf.php');

        session_start();
        echo $_SESSION['userName'] . " 님이 로그인하셨습니다.<br><br>";
        echo "나이 : " . $_SESSION['userAge'] . "<br><br>";
        echo "회원등급 : " . $_SESSION['userGrade'] . "<br><br>";

    ?>
<button onclick = main()>로그아웃</button>
<script>
    function main(){ location.href = 'main.php'; }
</script>
