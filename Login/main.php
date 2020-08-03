<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그인 시스템 구현</title>
</head>
<body>
<?php
if (!isset($_SESSION['userName'])) {
    ?>
    <form action="result.php" method="POST">
        <table>
            <tr>
                <td style="text-align: right">아이디 :</td>
                <td><input type="text" name="id" autocomplete="off"></td>
            </tr>
            <tr>
                <td style="text-align: right"> 패스워드 :</td>
                <td><input type="password" name="password" autocomplete="off"></td>
                <td><input type="submit" value="로그인하기"></td>
            </tr>
        </table>
    </form>

<? }else {
    require_once('db_conf.php');

    echo $_SESSION['userName'] . " 님이 로그인하셨습니다.<br><br>";
    echo "나이 : " . $_SESSION['userAge'] . "<br><br>";
    echo "회원등급 : " . $_SESSION['userGrade'] . "<br><br>";

?>
    <button onclick=sessionDestroy()>로그아웃</button>
    <script>
        function sessionDestroy() {
            <?php session_destroy()?>
            location.href = 'main.php';
        }
    </script>
<?} ?>

</body>
</html>
