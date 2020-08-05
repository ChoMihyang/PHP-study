<?php session_start();
// 미 로그인 사용자 접근 시 에러 메시지 출력
if(!isset($_SESSION['login']) || !$_SESSION['login'])
    echo "<script>alert('로그인 후 이용 가능합니다.')</script>"?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>글 수정하기</title>
    <link rel="stylesheet" href="css/modify.css">
</head>
<body>
<?php
require_once ('db_conf.php');

$board_id = $_GET['board_id'];

$mysql = "SELECT * FROM mybulletin WHERE board_id = $board_id";
$conn = connectDB();
$result = $conn->query($mysql);
$row = $result->fetch_assoc();
?>
<div id="modifyBox">
    <div id="modify"><h1>글 수정하기</h1></div>
    <form action="modify_process.php?board_id=<?=$row['board_id']?>" method="post" autocomplete="off">
        <div class="row">
            <div class="head">작성자</div>
            <input type="hidden" name="name" value="<?=$_SESSION['userId']?>">
            <div class="input" style="font-size: 20px"><?=$_SESSION['userId']?></div>
        </div>
<!--        <div class="row">-->
<!--            <div class="head">비밀번호</div>-->
<!--            <div class="input"><input type="password" id="inputPw" name="password" placeholder="*본인 확인을 위해 비밀번호를 입력해 주세요."></div>-->
<!--        </div>-->
        <div class="row">
            <div class="head">제목</div>
            <div class="input"><input type="text" id="inputTitle" name="title" value="<?=$row['title']?>"</div>
        </div>
        <div class="row">
            <div class="head">내용</div>
            <div class="input"><textarea name="content" id="inputContent" cols="63" rows="10"><?=$row['content']?></textarea></div>
        </div>
        <div id="ctrl">
            <input class="button brown" type="submit" value="작성하기">
            <input class="button white" type="button" value="목록보기" onclick="location.href='list.php'">
        </div>
    </form>
</div>
</body>
</html>