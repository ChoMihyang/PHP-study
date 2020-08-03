<?php

session_start();

// 현 세션에 저장된 값 출력
// 생성된 변수는 $_SESSION["세션변수명"] 으로 접근한다.
echo $_SESSION['name']."<br>";
echo $_SESSION['age']."<br>";
echo $_SESSION['univ']."<br>";

// 현 세션 ID값 출력
// 세션 ID 는 웹 서버에 의해 무작위로 만들어진 숫자임.
// 이 ID는 세션이 유지되는 동안 클라이언트 측에 저장되며, 세션 변수를 등록하는 키로 사용됨.
// 웹 서버에서는 클라이언트로부터 받아온 세션 아이디를 가지고, 해당 아이디에 대응되는 세션 변수에 접근.
echo session_id();