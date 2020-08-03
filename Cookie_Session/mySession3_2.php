<?php
session_start();

// 현 세션에 저장된 변수 값 출력
foreach ($_SESSION as $key => $value)
    echo $key.":".$value."<br>";