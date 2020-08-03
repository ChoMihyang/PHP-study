<?php
// 세션 시작 : 세션 기능을 사용하기 전 반드시 선 실행
// 세션의 지속 시간은 쿠키와 달리 php.ini 파일에 설정되어 있으므로, 따로 명시해주지 않아도 됨.
session_start();

// 세션이 생성되고 나면 세션 변수를 슈퍼 글로벌인 $_SESSION 배열에 등록할 수 있다.
// 이 때 세션 변수의 이름이 key값이 되며, 이 내용은 서버 측에 저장된다.
// 등록된 세션 변수는 등록을 해지하지 않는 한 세션이 끝날 때까지 유지된다.
$_SESSION['name'] = "Youngchul jung";
$_SESSION['age'] = 22;
$_SESSION['univ'] = "Yeungjin Univ";
