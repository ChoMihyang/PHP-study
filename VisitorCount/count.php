<?php
require_once('db_conf.php');

$conn = new mysqli(
    db_info::DB_URL,
    db_info::USER_ID,
    db_info::PASSWD,
    db_info::DB_NAME
);

// DBMS 연결 실패 여부 검사
if ($conn->connect_errno) {
    echo "Connect failed";
    exit(-1); // 시스템 종료
}

if (!isset($_COOKIE['visited'])) {
    // 방문자 수 증가
    $mysql = "UPDATE visitorcount SET vc = vc + 1";

    $result = $conn->query($mysql);
    if (!$result) {
        echo "Request UPDATE query failed";
        exit(-1);
    }
    setcookie('visited', true, 0);
}

// 총 방문자 수 획득
$mysql = "SELECT * from visitorcount";

$result = $conn->query($mysql);
if (!$result) {
    echo "Request SELECT query failed";
    exit(-1);
}

echo "총 방문자 수 : ".$result->fetch_array()[0];
?>


