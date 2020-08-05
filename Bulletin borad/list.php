<?php session_start();?>

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
    <link rel="stylesheet" href="css/list.css">
</head>
<body>
<!---------------------------------------- 로그아웃 처리 ------------------------------------------------>
<?php
// 로그아웃 버튼 클릭 시 $_POST['logout'] -> true 전환
// 로그인 상태 true -> 세션 파괴 조건 포함
    if(isset($_POST['logout']) && $_POST['logout']){
        if(isset($_SESSION['login']) && $_SESSION['login']){
            $_SESSION = array();
            session_destroy();
        }
    }
?>
<!------------------------------------------ 로그인 화면 ----------------------------------------------->
<?php if(!$_SESSION['login']):?>
<form action="login_process.php" method="post" autocomplete="off">
    <div id="loginBox">
        <div><h1>로그인</h1></div>
        <div id="inputInfo">
            <div class="row">
                <div class="head">ID</div>
                <div><input type="text" name="id"></div>
            </div>
            <div class="row">
                <div class="head">PASSWORD</div>
                <div><input type="password" name="password"></div>
            </div>
        </div>
        <div id="loginBtn"><input type="submit" id="login" value="로그인하기"></div>
    </div>
</form>
<!-------------------------------------------- 세션 처리 ------------------------------------------------>
<?php else:?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div id="loginBox">
            <div><h1>회원 정보</h1></div>
            <div id="userInfo">
                <h2>&nbsp;안녕하세요,<br>&nbsp;<?= $_SESSION['userName']." 님 환영합니다."; ?></h2>
            </div>
            <input type="hidden" name="logout" value="true">
            <div id="logoutBtn"><input id="logout" type="submit" value="로그아웃"></div>
        </div>
    </form>
<?php endif;?>
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
        <?php
        if($_SESSION['login'])
            echo "<button class=\"button brown\" onclick=\"location.href='write.php'\">글쓰기</button>";
        ?>
        <?php
        if ($searchMode)
            echo "<button class=\"button all\" onclick=\"location.href='list.php'\">전체보기</button>";
        ?>
    </div>
</div>
</body>
</html>
