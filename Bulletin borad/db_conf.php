<?php

class db_info
{
    const DB_URL = "localhost";
    const USER_ID = "root";
    const PASSWD = "111111";
    const DB_NAME = "ycj_test";
}

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

?>