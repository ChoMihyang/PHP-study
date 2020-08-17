<?php
// 페이지 이동
function location($argLocal)
{
    echo "<script>location.href = '" . $argLocal . "'</script>";
}


// errorCode 1 : 데이터 전송 오류
// errorCode 2 : 데이터 공란 오류
// errorCode 3 : 미등록 게시물 오류
// errorCode 4 : 비밀번호 입력 오류
function printMsg($argMsg)
{
    switch ($argMsg) {
        case 1 :
            echo "<script>alert('관리자에게 문의 바랍니다.');</script>";
            location(boardInfo::FILETO_LIST);
            break;
        case 2 :
            echo "<script>alert('공란을 채워 주시기 바랍니다.');history.back();</script>";
            break;
        case 3 :
            echo "<script>alert('등록되지 않은 게시물입니다. 다시 확인해 주세요.');history.back();</script>";
            break;
        case 4 :
            echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 입력해 주세요.');history.back();</script>";
            break;
    }
}

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
            printMsg(3);
    }

    $fieldList = [];

// 데이터 무결성(공란) 검사
// 공란 있을 경우 에러 메시지 출력 후 재입력 요청
    foreach ($argList as $value) {
        if (!isset($type[$value]) || $type[$value] == "") {
            printMsg(2);
            $fieldList = false;
        }

        if ($htmlStripTagsOn) {
            $fieldList[$value] = htmlspecialchars($type[$value]);
        } else {
            $fieldList[$value] = $type[$value];
        }
    }
    return $fieldList;
}

// board_id 값 유효성 확인 후 반환
function getBoardId($board_id)
{
    if (isset($board_id) && is_numeric($board_id) && $board_id >= 0)
        return $board_id;
}
?>