<?php
session_start();

//  현 세션에 저장된 변수 값 삭제
//  unset() -> 특정 이름의 세션 변수만 해지
unset($_SESSION['name']);
