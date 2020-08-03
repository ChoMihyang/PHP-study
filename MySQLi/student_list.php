<!--<성적 처리 프로그램>-->
<!--    요구사항-->
<!--    1. 성적 입력-->
<!--     - DB에 입력된 학생 정보 및 성적 입력-->
<!--     - DB에 저장된 학생 정보 및 성적을 획득(입력순)하여 html table로 출력-->
<!--    2. 성적 정렬(오름차순)-->
<!--     - DB에 저장된 학생 정보 및 성적을 획득(오름차순)하여 html table로 출력-->
<!--    3. 성적 정렬(내림차순)-->
<!--     - DB에 저장된 학생 정보 및 성적을 획득(내림차순)하여 html table로 출력-->

<?php
require_once('db_conf.php');

$db_conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB_NAME);

$name = $_POST['name'];
$kor = $_POST['kor'];
$eng = $_POST['eng'];
$math = $_POST['math'];
$sum = $_POST['kor'] + $_POST['eng'] + $_POST['math'];
$avg = round($sum / 3,2);

$mysql = "INSERT INTO student VALUES (0,'$name', '$kor', '$eng', '$math', '$sum', '$avg')";
$result = $db_conn->query($mysql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>성적 처리 프로그램</title>
    <style>
        #scoreBoard {
            width: 800px;
            border-collapse: collapse;
        }

        #scoreBoard td {
            border: 1px solid black;
            text-align: center;
        }

        #inputBoard {
            line-height: 50px;
            text-align: center;

        }

        /*#input{
            height: 50px;
            width: 900px;
            background-color: #ffd31d;
            border-radius: 10px;
        }*/
    </style>
</head>
<body>
<h2>성적 처리 프로그램</h2>
<div id="input">
    <table id="inputBoard">
        <tr>
            <form action="<? echo $_SERVER['PHP_SELF'] ?>" method="post">
                <td bgcolor="white">
                    이름 : <input type="text" size="8" name="name" autocomplete="off">
                    국어 : <input type="text" size="5" name="kor" autocomplete="off">
                    영어 : <input type="text" size="5" name="eng" autocomplete="off">
                    수학 : <input type="text" size="5" name="math" autocomplete="off">
                    <input type="submit" value="입력">
                    <input type="hidden" name="mode" value="insert">
                </td>
            </form>

            <form action="<? echo $_SERVER['PHP_SELF'] ?>" method="post">
                <td bgcolor="white">
                    <input type="submit" value="성적 정렬(오름차순)">
                    <input type="hidden" name="mode" value="ascend">
                </td>
            </form>

            <form action="<? echo $_SERVER['PHP_SELF'] ?>" method="post">
                <td bgcolor="white">
                    <input type="submit" value="성적 정렬(내림차순)">
                    <input type="hidden" name="mode" value="descend">
                </td>
            </form>
        </tr>
    </table>
</div>
<div id="score">
    <table id="scoreBoard">
        <tr>
            <td>번호</td>
            <td>이름</td>
            <td>국어</td>
            <td>영어</td>
            <td>수학</td>
            <td>합계</td>
            <td>평균</td>
            <td></td>
        </tr>
        <?php
        $mysql = "SELECT * FROM student";
        $result = $db_conn->query($mysql);
        if ($result) {
        while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['num']?></td>
            <td><?= $row['name']?></td>
            <td><?= $row['kor']?></td>
            <td><?= $row['eng']?></td>
            <td><?= $row['math']?></td>
            <td><?= $row['sum']?></td>
            <td><?= $row['avg']?></td>
            <td><a href="#">삭제</a></td>
            <?}
        }?>
        </tr>
    </table>
</div>
</body>
</html>
