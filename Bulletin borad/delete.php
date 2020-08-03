<?php
require_once('db_conf.php');
// 게시물 삭제로부터 전송된 글 번호
$board_id = $_POST['board_id'];
// 댓글 삭제로부터 전송된 글 번호와 부모글 번호
$commBoard_id = $_GET['board_id'];
$commBoard_pid = $_GET['board_pid'];

//echo "글 삭제 : ".$board_id;
//echo "댓글 삭제 : ".$commBoard_id;
//echo "댓글 삭제 : ".$commBoard_pid;

// 게시물 삭제인지, 댓글 삭제인지 구별
$regNum = "";
if($commBoard_pid > 0) {
    $regNum = $commBoard_pid."번 글의 댓글 삭제하기";
}else {
    $regNum = $board_id."번 글 삭제하기";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>글 삭제하기</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #dbe9b7;
        }

        #deleteBox {
            width: 600px;
            height: 300px;
            margin: 80px auto;
            padding: 20px;
            background-color: #fdfdf6;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .4);
            font-family: 'Jua', sans-serif;
        }

        h1 {
            border-bottom: 1px solid #ababab;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        #input {
            margin-top: 50px;
        }

        #head {
            font-size: 20px;
            color: #838383;
            padding: 2px;
        }

        input[type=password] {
            height: 30px;
            font-size: 20px;
            border-radius: 4px;
            font-family: 'Jua', sans-serif;
            border: 1px solid #ababab;
            color: black;
        }

        input[type=submit] {
            color: black;
            border-radius: 3px;
            font-size: 18px;
            padding: 1px 8px 3px;
            vertical-align: middle;
            cursor: pointer;
            font-family: 'Jua', sans-serif;
            border: 1px solid #b8b2a6;
            background-color: #b8b2a6;
        }

        input[type=submit]:hover {
            background-color: #b9ac92;
        }

        #button {
            margin: 80px auto;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="deleteBox">
    <form action="delete_process.php" method="post">
        <div id="delete"><h1><?=$regNum?></h1></div>
        <div id="input">
            <div id="head">비밀번호</div>
            <input type="password" name="password" size="50" placeholder="*본인 확인을 위해 비밀번호를 입력해 주세요.">
        </div>
        <div id="button"><input type="submit" value="삭제하기"></div>
        <!--hidden 값으로 글 번호, 부모 글 번호 전송-->
        <input type="hidden" name="board_id" value="<?= $board_id ?>">
        <input type="hidden" name="commBoard_id" value="<?= $commBoard_id?>">
        <input type="hidden" name="commBoard_pid" value="<?= $commBoard_pid?>">
    </form>
</div>
</body>
</html>