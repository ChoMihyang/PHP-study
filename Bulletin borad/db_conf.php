<?php

// 데이터 베이스 정보
class db_info
{
    const DB_URL = "localhost";
    const USER_ID = "root";
    const PASSWD = "111111";
    const DB_NAME = "ycj_test";
}

// 데이터베이스 연결 객체 반환 함수
function connectDB()
{
    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB_NAME
    );
    if($conn->connect_errno){
        echo "Database Connection Error";
    }else return $conn;
}

// 데이터베이스 접속 성공 여부 확인
function connectCheck($result){
    if(!$result){
        echo "Not Successfully Query To Database";
        exit(-1);
    }
    return true;
}
?>