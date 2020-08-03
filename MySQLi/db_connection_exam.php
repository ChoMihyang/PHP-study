<?php
require_once('db_conf.php');
// DBMS 에 연결하기 위한 mysqli 객체 생성
$db_conn = new mysqli(
    db_info::DB_URL,
    db_info::USER_ID,
    db_info::PASSWD,
    db_info::DB_NAME
);
//DBMS 연결 실패 여부 검사
// connect_errno : Error Code 반환
// 에러가 없을 경우 0 반환
if ($db_conn->connect_errno) {
    echo "Failed to connect to the MySQL Server<br>";
    exit(-1); // 연결 실패 시 반드시 시스템 종료 : php 엔진 번역 작업 중지, 프로그램 종료
              // DBMS 연결 실패 후 아래 코드 실행 의미 없음
} else
    echo "DB connection is successfully established<br>";

// DBMS connection 종료
// PHP 페이지 종료시 Garbage Collector 에 의해 자동으로 종료
// close() 호출 시 코드 실행 중 자원 즉시 반납
$db_conn->close();

//table 에 레코드를 삽입할 SQL 문 작성
$sql_stmt = 'INSERT INTO customer VALUES (1, "L1234", "12345a", "YCJUNG", "J1", 22)';

// DBMS 에 Query 전송
if ($result = $db_conn->query($sql_stmt))
    echo "데이터 삽입 성공!<br>";
else
    echo "데이터 삽입 실패<br>";

// customer 테이블 내 레코드를 검색하는 SQL 문 작성
$sql_stmt = 'SELECT * FROM customer';
// DBMS 에 Query 전송
// Non-DML(select) 의 경우 쿼리 성공 시 mysqli_result 객체(레코드)반환, 실패 시 false 반환
if ($result = $db_conn->query($sql_stmt)) {
    // fetch_assoc() : DBMS 로부터 획득한 레코드를 Association Array 로 반환
    // fetch_assoc() 를 호출할 때마다 획득한 레코드를 Top 에서 Bottom 순서로 반환
    // 레코드를 순회하다가 더 이상 반환 레코드가 없을 시 NULL 반환
    while ($row = $result->fetch_assoc()) {
        echo $row['customerid'] . " : " . $row['id'] . " : " . $row['password'] . " : " . $row['name'] . " : "
            . $row['level'] . " : " . $row['age'] . "<br>";
    }
}else
    echo "데이터 검색 실패<br>";
?>
