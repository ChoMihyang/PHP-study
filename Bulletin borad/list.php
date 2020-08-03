<!-------------------------------------- 검색 기능 초기 설정 -------------------------------------------->
<?php
require_once('db_conf.php');

// 검색 모드 설정
$searchMode = false;
// 검색 옵션과 키워드 값이 저장되어 있을 경우
// 검색 모드 on, 검색 옵션 값과 키워드 값 저장
// 조건에 따라 쿼리문 구별
if (isset($_GET['searchOption']) && isset($_GET['keyword'])) {
    $searchMode = true;
    $searchOption = $_GET['searchOption'];
    $keyword = $_GET['keyword'];

    $fieldSet = "";

    switch ($searchOption) {
        case "title":
            $fieldSet = "title LIKE " . "\"%{$keyword}%\"";
            break;
        case "content" :
            $fieldSet = "content LIKE " . "\"%{$keyword}%\"";
            break;
        case "name" :
            $fieldSet = "user_name LIKE " . "\"%{$keyword}%\"";
            break;
        case "titleContent" :
            $fieldSet = "title LIKE " . "\"%{$keyword}%\" OR content LIKE " . "\"%{$keyword}%\"";
            break;
    }
}

//----------------------------- 페이지네이션 변수 초기값 설정 --------------------------------------------//

$page_size = 10;        // 한 페이지당 보여줄 게시물의 수(환경 설정 변수)
$page_list_size = 10;   // 페이지 리스트에 보여줄 페이지의 수

// 전체 게시물 수 구하기
$mysql = "SELECT count(*) FROM mybulletin";
$mysql = ($searchMode == true) ? $mysql . " WHERE {$fieldSet}" : $mysql;
$conn = connectDB();
$result = $conn->query($mysql);
$resultRow = $result->fetch_array();
$total_row = $resultRow[0];

// 총 페이지 수 구하기( 총 페이지 수 = ceil(총 게시물 수 / 한 페이지당 나타낼 게시물 수) )
// 총 게시물 수가 0이거나 음수값이라면 0으로 설정
if ($total_row <= 0) $total_row = 0;
$total_page = ceil($total_row / $page_size);

// $no 값이 안 넘어오거나 음수 값이 넘어 오는 경우 0으로 설정
$no = $_GET['no'];
if (!$no || $no < 0) $no = 0;

// 현재 페이지 번호 구하기
$current_page = ceil(($no + 1) / $page_size);

// 페이지 목록의 첫 번째 페이지 번호 구하기(1, 11, 21 ...)
$start_page = floor(($current_page - 1) / $page_list_size) * $page_list_size + 1;

// 페이지 목록의 마지막 페이지 번호 구하기(10, 20, 30...)
$end_page = $start_page + $page_list_size - 1; // 페이지가 $page_list_size 만큼 채우는 경우
// 페이지가 $page_list_size 값보다 모자란 경우,
// 전체 페이지가 곧 마지막 페이지 번호가 됨
if ($total_page < $end_page) $end_page = $total_page;
?>
<!---------------------------------------------------------------------------------------------------------->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>글 목록보기</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #dbe9b7;
        }

        #listBox {
            width: 800px;
            height: 790px;
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

        table {
            width: 100%;
        }

        th {
            font-size: 19px;
        }

        td {
            text-align: center;
            height: 50px;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            color: black;
            line-height: 30px;
        }

        a:hover {
            text-decoration: underline;
        }

        #ctrl {
            margin-top: 15px;
            float: right;
        }

        #white {
            border-radius: 3px;
            padding: 4px 10px;
            border: 1px solid #b8b2a6;
            background-color: white;
            cursor: pointer;
        }

        #white:hover {
            background-color: #e8e4e1;
        }

        .button {
            border-radius: 3px;
            padding: 5px 10px;
            font-size: 18px;
            font-family: 'Jua', sans-serif;
            cursor: pointer;
        }

        .brown {
            background-color: #b8b2a6;
            border: 1px solid #b8b2a6;
        }

        .brown:hover {
            background-color: #b9ac92;
        }

        .all {
            background-color: white;
            border: 1px solid #b8b2a6;
        }

        .all:hover {
            background-color: #e8e4e1;
        }

        #pagination {
            margin: 15px auto;
        }

        .list {
            display: inline-block;
            width: 30px;
            height: 30px;
            text-decoration: none;
            border-radius: 5px;
            color: black;
            text-align: center;
        }

        .list:hover {
            color: white;
            background-color: #596e79;
        }

        #search {
            text-align: center;
        }

        input[name=keyword], select {
            height: 25px;
            border-radius: 4px;
            border: 1px solid #ababab;
        }
    </style>
</head>
<body>
<?php
$mysql = "SELECT * FROM mybulletin WHERE board_pid = 0";
$mysql = ($searchMode == true ? $mysql . " AND {$fieldSet} " : $mysql);
$mysql .= " ORDER BY board_id DESC LIMIT $no, $page_size";
$conn = connectDB();
$result = $conn->query($mysql);
?>
<div id="listBox">
    <div id="list"><h1>글 목록 보기</h1></div>
    <table>
        <tr>
            <th style="width: 80px">번호</th>
            <th style="width: 380px">제목</th>
            <th style="width: 165px">작성자</th>
            <th style="width: 165px">날짜</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['board_id'] . "</td>";
            echo "<td><a href='view.php?board_id=" . $row['board_id'] . "'>" . $row['title'] . "</a></td>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . date_format(date_create($row['reg_date']), 'Y-m-d') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <!---------------------------------------- 페이지네이션 기능 구현 ------------------------------------------->
    <table id="pagination">
        <tr>
            <td style="text-align: center" rowspan="4">
                <?php
                // 이전 ( < ) 기능 구현
                if ($start_page > $page_list_size) {
                    $prev_list = ($start_page - 2) * $page_size;

                    if ($searchMode) {
                        echo "<a class = \"list\" 
                                href=\"{$_SERVER['PHP_SELF']}?searchOption={$searchOption}&keyword={$keyword}&no={$prev_list}\"> < </a>";
                    } else {
                        echo "<a class = \"list\" href=\"{$_SERVER['PHP_SELF']}?no={$prev_list}\"> < </a>";
                    }
                }

                // 숫자 페이지 출력(1 ~ 10)
                for ($i = $start_page; $i <= $end_page; $i++) {
                    $page = ($i - 1) * $page_size;
                    if ($searchMode) {
                        if ($i === $current_page) {
                            echo "<a class = \"list\" href=\"{$_SERVER['PHP_SELF']}?searchOption={$searchOption}&keyword={$keyword}&no={$page}\"  
                                    style=\"color : white; background-color: #596e79\">{$i}</a>";
                        } else {
                            echo "<a class = \"list\" href=\"{$_SERVER['PHP_SELF']}?searchOption={$searchOption}&keyword={$keyword}&no={$page}\">{$i}</a>";
                        }
                    } else {
                        if ($i === $current_page)
                            echo "<a class = \"list\" href=\"{$_SERVER['PHP_SELF']}?no={$page}\" style=\"color : white; background-color: #596e79\">{$i}</a>";
                        else
                            echo "<a class = \"list\" href=\"{$_SERVER['PHP_SELF']}?no={$page}\">{$i}</a>";
                    }
                }

                // 다음 ( > ) 기능 구현
                if ($total_page > $end_page) {
                    $next_list = $end_page * $page_size;
                    if ($searchMode) {
                        echo "<a class = \"list\" 
                              href=\"{$_SERVER['PHP_SELF']}?searchOption={$searchOption}&keyword={$keyword}&no={$next_list}\"> > </a>";
                    } else {
                        echo "<a class = \"list\" href=\"{$_SERVER['PHP_SELF']}?no={$next_list}\"> > </a>";
                    }
                }
                ?>
            </td>
        </tr>
    </table>
    <!---------------------------------------------------------------------------------------------------------->
    <!----------------------------------------- 검색 기능 폼 --------------------------------------------------->
    <div id="search">
        <form action="list.php" method="GET">
            <select name="searchOption">
                <option value="title">제목</option>
                <option value="content">내용</option>
                <option value="name">작성자</option>
                <option value="titleContent">제목+내용</option>
            </select>
            <input type="text" name="keyword" size="25" autocomplete="off">
            <input id="white" type="submit" value="검색">
        </form>
    </div>
    <!-------------------------------------------------------------------------------------------------------->
    <div id="ctrl">
        <button class="button brown" onclick="location.href='write.php'">글쓰기</button>
        <?php
        if ($searchMode)
            echo "<button class=\"button all\" onclick=\"location.href='list.php'\">전체보기</button>";
        ?>
    </div>
</div>
</body>
</html>