<?php
require_once "./conf/board_info.php";
require_once "./conf/db_info.php";
require_once "./model/util.php";

// get 으로 받은 게시물 번호로 해당 게시물 정보 조회
$board_id = $_GET['board_id'];
$row = dbSelect($board_id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>글 수정하기</title>
    <link rel="stylesheet" href="../css/modify.css">
</head>
<body>
<div id="modifyBox">
    <div><h1>글 수정하기</h1></div>
    <!--제목, 작성자, 내용 화면에 출력-->
    <form action="<?php echo boardInfo::FILETO_MODIFY_PROCESS?>?board_id=<?=$board_id?>" method="post" autocomplete="off">
        <div class="row">
            <div class="head">작성자</div>
            <div class="input" style="font-size: 20px"><?= $row['user_name']?></div>
            <input type="hidden" name="name" value="<?= $row['user_name']?>">
        </div>
        <div class="row">
            <div class="head">제목</div>
            <div class="input"><input type="text" id="inputTitle" name="title" value="<?= $row['title']?>"></div>
        </div>
        <div class="row">
            <div class="head">내용</div>
            <div class="input"><textarea name="content" id="inputContent" cols="63" rows="10"><?= $row['content']?>"</textarea></div>
        </div>
        <!--수정하기, 목록으로 버튼 구현-->
        <div id="ctrl">
            <input class="button brown" type="submit" value="수정하기">
            <input class="button white" type="button" value="목록보기" onclick="location.href='<?php echo boardInfo::FILETO_LIST?>'">
        </div>
    </form>
</div>
</body>
</html>



