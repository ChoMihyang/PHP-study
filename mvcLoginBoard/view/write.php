<?php
session_start();
require_once './conf/board_info.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/write.css">
</head>
<body>
<div id="writeBox">
    <div id="write"><h1>글 작성하기</h1></div>
    <form action="<?php echo boardInfo::FILETO_WRITE_PROCESS?>" method="post" autocomplete="off">
        <div class="row">
            <div class="head">작성자</div>
            <div style="font-size: 20px"><?php echo $_SESSION['userId']?></div>
            <input type="hidden" name="name" value="<?=$_SESSION['userId']?>">
        </div>
        <div class="row">
            <div class="head">제목</div>
            <div class="input"><input type="text" id="inputTitle" name="title"></div>
        </div>
        <div class="row">
            <div class="head">내용</div>
            <div class="input"><textarea name="content" cols="63" rows="10"></textarea></div>
        </div>
        <div id="ctrl">
            <input class="button brown" type="submit" value="작성하기">
            <input class="button white" type="button" onclick="location.href='<?php echo boardInfo::FILETO_LIST?>'" value="목록보기">
        </div>
    </form>
</div>
</body>
</html>