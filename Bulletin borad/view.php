<?php
require_once('db_conf.php');
$board_id = $_GET['board_id'];

$mysql = "SELECT * FROM mybulletin WHERE board_id = $board_id";
$conn = connectDB();
$result = $conn->query($mysql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>글보기</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');

        * {
            margin: 0 auto;
            padding: 0;
        }

        body {
            background-color: #dbe9b7;
        }

        h1 {
            border-bottom: 1px solid #ababab;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        #viewBox {
            width: 600px;
            height: auto;
            margin-top: 80px;
            padding: 20px;
            background-color: #fdfdf6;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .4);
            font-family: 'Jua', sans-serif;
            overflow: hidden;
        }

        .row {
            padding: 10px 0;

        }

        .head {
            color: #838383;
            padding: 2px;
            font-size: 20px;
        }

        .input {
            vertical-align: middle;
            font-size: 25px;
        }

        #ctrl {
            text-align: center;
            margin: 30px auto;

        }

        .button {
            color: black;
            font-size: 18px;
            border-radius: 3px;
            display: inline-block;
            padding: 1px 8px 3px;
            margin: 0 4px;
            vertical-align: middle;
            cursor: pointer;
            font-family: 'Jua', sans-serif;
        }

        .white {
            border: 1px solid #b8b2a6;
            background-color: white;
        }

        .white:hover {
            background-color: #e8e4e1;
        }

        .brown {
            border: 1px solid #b8b2a6;
            background-color: #b8b2a6;
        }

        .brown:hover {
            background-color: #b9ac92;
        }

        input[type=text],
        input[type=password] {
            height: 25px;
        }

        input[type=text],
        input[type=password],
        textarea {
            border-radius: 4px;
            border: 1px solid #ababab;
            font-size: 17px;
            font-family: 'Jua', sans-serif;
        }

        h3 {
            margin: 20px auto;
            text-align: center;
            border-top: 1px solid #ababab;
        }

        #inputTable {
            margin: 0 auto;
        }

        tr {
            margin-bottom: 10px;
        }

        #commTable {
            width: 600px;
            margin-top: 20px;
            border: 1px solid black;
        }

        th {
            background-color: #b8b2a6;
            height: 25px;
        }

        #commTable td {
            text-align: center;
            height: 30px;
        }
    </style>
</head>
<body>
<div id="viewBox">
    <div id="view"><h1><?= $row['board_id'] ?>번 글</h1></div>
    <form action="#" method="post" autocomplete="off">
        <div class="row">
            <div class="head">작성일</div>
            <div class="input"><?= $row['reg_date'] ?></div>
        </div>
        <div class="row">
            <div class="head">작성자</div>
            <div class="input"><?= $row['user_name'] ?></div>
        </div>
        <div class="row">
            <div class="head">제목</div>
            <div class="input"><?= $row['title'] ?></div>
        </div>
        <div class="row">
            <div class="head">내용</div>
            <div class="input"><?= $row['content'] ?></div>
        </div>
        <div id="ctrl">
            <input class="button brown" type="submit" value="수정하기"
                   formaction="modify.php?board_id=<?= $row['board_id'] ?>">
            <input class="button brown" type="submit" value="삭제하기" formaction="delete.php">
            <input type="hidden" name="board_id" value="<?=$row['board_id']?>">
            <input class="button white" type="submit" value="목록보기" formaction="list.php">
        </div>
    </form>

    <!---------------------------------------------- 댓글 기능 구현 ------------------------------------------------------->
    <?php
    $mysql = "SELECT * FROM mybulletin WHERE board_pid = $board_id";
    $conn = connectDB();
    $result = $conn->query($mysql);
    ?>
    <!--입력 테이블-->
    <form action="comment_write.php" method="post" autocomplete="off">
        <input type="hidden" name="board_id" value="<?= $board_id ?>">
        <div><h3>COMMENT</h3></div>
        <table id="inputTable">
            <tr>
                <td>작성자&nbsp;</td>
                <td><input type="text" name="commName"></td>
                <td class="row">&nbsp;&nbsp;비밀번호&nbsp;</td>
                <td><input type="password" name="commPasswd"></td>
            </tr>
            <tr>
                <td>코멘트</td>
                <td colspan="3"><textarea name="commContent" cols="49" rows="3"></textarea></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center;">
                    <input class="white button" type="submit" value="댓글달기"></td>
            </tr>
        </table>
    </form>
    <!--출력 테이블-->
    <table id="commTable">
        <tr>
            <th style="width: 150px">작성자</th>
            <th style="width: 230px">내용</th>
            <th style="width: 150px">작성일</th>
            <th style="width: 60px">삭제</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['content'] . "</td>";
            echo "<td>" . date_format(date_create($row['reg_date']), 'Y-m-d') . "</td>";
            echo "<td><a href='delete.php?board_id=".$row['board_id']."&board_pid=".$row['board_pid']."'>
                  <img src=\"trashbin.png\" width=\"20px\" height=\"25px\"></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>