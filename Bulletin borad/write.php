<?php session_start();
// 미 로그인 사용자 접근 시 에러 메시지 출력
if(!isset($_SESSION['login']) || !$_SESSION['login'])
    echo "<script>alert('로그인 후 이용 가능합니다.')</script>";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>글쓰기</title>
    <link rel="stylesheet" href="css/write.css">
</head>
<body>
<div id="writeBox">
    <div id="write"><h1>글 작성하기</h1></div>
    <form action="write_process.php" method="post" autocomplete="off">
    <div class="row">
        <div class="head">작성자</div>
        <div style="font-size: 20px"><?php echo $_SESSION['userId']?></div>
        <input type="hidden" name="name" value="<?= $_SESSION['userId']?>">
    </div>
    <div class="row">
        <div class="head">제목</div>
        <div class="input"><input type="text" id="inputTitle" name="title"></div>
    </div>
    <div class="row">
        <div class="head">내용</div>
        <div class="input"><textarea name="content" id="inputContent" cols="63" rows="10"></textarea></div>
    </div>
        <div id="ctrl">
            <input class="button brown" type="submit" value="작성하기">
            <input class ="button white" type="button" onclick="location.href='list.php'" value="목록보기">
        </div>
    </form>
</div>
</body>
</html>