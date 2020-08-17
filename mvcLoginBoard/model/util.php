<?php
require_once "./conf/db_info.php";

//데이터 무결성, 공란 검사 및 HTML 태그 제거
function dataCheck($dataType, $argList, $htmlStripTagsOn)
{
    switch ($dataType) {
        case "POST" :
            $type = $_POST;
            break;
        case "GET" :
            $type = $_GET;
            break;
        default :
//            printMsg(3);
    }

    $fieldList = [];

// 데이터 무결성(공란) 검사
// 공란 있을 경우 에러 메시지 출력 후 재입력 요청
    foreach ($argList as $value) {
        if (!isset($type[$value]) || $type[$value] == "") {
            $fieldList = false;
            return $fieldList;
        }

        if ($htmlStripTagsOn) {
            $fieldList[$value] = htmlspecialchars($type[$value]);
        } else {
            $fieldList[$value] = $type[$value];
        }
    }
    return $fieldList;
}


// 조회수 증가 함수
function updateHits($board_id){
    $conn = dbConnect();
    $mysql = "UPDATE mybulletin SET hits = hits + 1 WHERE board_id = $board_id";
    if(!$result = $conn->query($mysql)){
        echo "not transmit query";
    }else{
        return true;
    }
}

// 에러 메시지 출력 함수
function prtError($argError){
    switch ($argError){
        case "dataError":
            echo "<script>alert('데이터 입력 오류');history.back();</script>";
        break;
        case "sqlError";
        echo "<script>alert('SQL 요청 오류');</script>";
        break;
    }
}

// 목록 페이지 이동 함수
function moveListPage(){
    echo "<script>location.href='".boardInfo::URL.boardInfo::PATH.boardInfo::INDEX."'</script>";
}
?>