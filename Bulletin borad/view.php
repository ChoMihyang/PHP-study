<?php
session_start();

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
    <link rel="stylesheet" href="css/view.css">
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
<!--        *버튼 기능
            - 현재 로그인한 사용자의 게시물을 볼 경우 모두 구현
            - 다른 사용자이거나 미 로그인 사용자이 게시물을 볼 경우 '목록보기'만! 구현-->
        <div id="ctrl">
        <?php
            if($row['user_name'] === $_SESSION['userId']):?>
            <input class="button brown" type="submit" value="수정하기"
                   formaction="modify.php?board_id=<?= $row['board_id'] ?>">
            <input class="button brown" type="submit" value="삭제하기" formaction="delete_process.php">
            <input type="hidden" name="board_id" value="<?=$row['board_id']?>">
            <?endif;?>
            <input class="button white" type="submit" value="목록보기" formaction="list.php">
        </div>
    </form>

    <!---------------------------------------------- 댓글 기능 구현 ------------------------------------------------------->
    <?php
    $mysql = "SELECT * FROM mybulletin WHERE board_pid = $board_id";
    $conn = connectDB();
    $result = $conn->query($mysql);
    $row = $result->fetch_assoc();
    ?>
    <!--입력 테이블-->
<!--미 로그인 사용자일 경우 댓글 달기 불가능-->
    <div><h3>COMMENT</h3></div>
    <?php if($_SESSION['login']):?>
        <form action="comment_write.php" method="post" autocomplete="off">
        <input type="hidden" name="board_id" value="<?= $board_id ?>">
        <table id="inputTable">
            <tr>
                <td><input type="hidden" name="commName" value="<?=$_SESSION['userId']?>"></td>
            </tr>
            <tr>
                <td>코멘트</td>
                <td colspan="3"><textarea name="commContent" cols="49" rows="3"></textarea></td>
                <td colspan="4" style="text-align: center;">
                    <input class="white button" type="submit" value="댓글달기"></td>
            </tr>
        </table>
    </form>
    <?endif;?>
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
//            echo "<td><a href='delete.php?board_id=".$row['board_id']."&board_pid=".$row['board_pid']."'>
            if($row['user_name'] === $_SESSION['userId']) {
                echo "<td><a href='delete_process.php?board_id=" . $row['board_id'] . "&board_pid=" . $row['board_pid'] . "'>
                  <img src=\"trashbin.png\" width=\"20px\" height=\"25px\"></a></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>