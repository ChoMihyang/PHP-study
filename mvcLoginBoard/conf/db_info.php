<?php
 require_once "./model/util.php";
// db 정보 클래스 생성
class db_info
{
    const HOST_NAME = "localhost";
    const USER_NAME = "root";
    const USER_PASSWORD = "111111";
    const DATABASE = "ycj_test";
}
// db 연결 함수
function dbConnect()
{
    $conn = new mysqli(
        db_Info::HOST_NAME,
        db_Info::USER_NAME,
        db_Info::USER_PASSWORD,
        db_Info::DATABASE
    );
    if ($conn->connect_errno) {
        echo "DB 연결 실패";
    }
    return $conn;
}
// DB 쿼리문 요청 성공 여부 확인 함수
function connCheck($mysql){
    $conn = dbConnect();
    if($result = $conn->query($mysql)){
        return true;
    }else{
        prtError("sqlError");
    }
}
// 글 번호가 필요한 기능을 위한 게시물 정보 조회 함수
function dbSelect($board_id = ""){
    $row = [];
    $conn = dbConnect();

    $mysql = "SELECT * FROM mybulletin";
    if($board_id !== "") $mysql .= " WHERE board_id = ".$board_id;
    $mysql .= " AND board_pid = 0";

    if($result = $conn->query($mysql)) $row = $result->fetch_assoc();

    return $row;
}
?>