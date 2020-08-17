<?php
session_start();
require_once "./conf/board_info.php";
require_once "./conf/db_info.php";
require_once "./model/util.php";

//로그인 폼 또는 회워정보 view 표시
include "login.php";

//검색 입력 키워드
//echo "옵션 : " . $_POST['searchOption']."<br>";
//echo "키워드 : ".$_POST['keyword'];
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>게시글 목록</title>
        <link rel="stylesheet" href="./css/list.css">
    </head>
    <body>
    <div id="listBox">
        <div id="list"><h1>글 목록 보기</h1></div>
        <table>
            <tr>
                <th style="width: 80px">번호</th>
                <th style="width: 380px">제목</th>
                <th style="width: 165px">작성자</th>
                <th style="width: 80px">조회수</th>
                <th style="width: 165px">날짜</th>
            </tr>

            <?php
            // 게시글 정보 조회
            $row = dbSelect();

            foreach ($boardList as $board) {
                echo "<tr>";
                echo "<td>{$board['board_id']}</td>";
                echo "<td><a href='index.php/viewBoard?board_id={$board['board_id']}'>{$board['title']}</a></td>";
                echo "<td>{$board['user_name']}</td>";
                echo "<td>{$board['hits']}</td>";
                echo "<td>".date_format(date_create($board['reg_date']), 'Y-m-d')."</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div id="ctrl">
            <?php
            if($_SESSION['login'])
                echo "<button class=\"button brown\" onclick=\"location.href='index.php/write'\">글쓰기</button>"
            ?>
        </div>
    </div>
    </body>
    </html>

    <!--검색 폼 표시-->
<?php //include 'searchMode.php';?>