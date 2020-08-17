<?php
session_start();
require_once "./model/util.php";

// 해당 게시물 정보 조회
$board = dbSelect($_GET['board_id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>글 보기</title>
    <link rel="stylesheet" href="../css/view.css">
</head>
<body>
<div id="viewBox">
    <div id="view"><h1><?=$_GET['board_id']?>번 글</h1></div>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="row">
            <div class="head">작성일</div>
            <div class="input"><?= $board['reg_date']?></div>
        </div>
        <div class="row">
            <div class="head">작성자</div>
            <div class="input"><?= $board['user_name']?></div>
        </div>
        <div class="row">
            <div class="head">제목</div>
            <div class="input"><?= $board['title']?></div>
        </div>
        <div class="row">
            <div class="head">내용</div>
            <div class="input"><?= $board['content']?></div>
        </div>
        <div id="ctrl">
            <?php if($board['user_name'] === $_SESSION['userId']):?>
                <!--글 수정 버튼-->
                <input type="submit" value="수정하기"
                       formaction="<?php echo boardInfo::FILETO_MODIFY?>?board_id=<?=$board['board_id']?>">
                <!--글 삭제 버튼-->
                <input type="submit" value="삭제하기"
                       formaction="<?php echo boardInfo::FILETO_DELETE_PROCESS?>?board_id=<?=$board['board_id']?>">
            <?php endif;?>
            <!--목록보기 버튼-->
            <button type="submit" formaction="<?php echo boardInfo::URL.boardInfo::PATH.boardInfo::INDEX?>">목록보기</button>
        </div>
    </form>
</div>
</body>
</html>
