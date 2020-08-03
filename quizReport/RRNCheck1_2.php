<?php
// 입력한 주민등록번호 저장
$rrnNum = $_POST['frontNumber'] . $_POST['backNumber'];
// 문자열 길이 저장
$strLen = strlen($rrnNum);

//주민등록번호 배열 생성
$numbers = [];
// 문자열을 한 자리씩 배열에 저장
$numbers = str_split($rrnNum);

//체크 수 배열 생성
$multiCheck = [2, 3, 4, 5, 6, 7, 8, 9, 2, 3, 4, 5];

//주민등록번호 * 체크수
$sum = 0;
for($i = 0 ; $i < count($multiCheck) ; $i++){
    $sum += $numbers[$i] * $multiCheck[$i];
}

//체크 계산
$lastNum = substr($rrnNum, -1);
$finalCheck = 11 - ( $sum % 11);


// 계산 조건이 true일 경우
echo "<div style='font-size: 30px'>";
if($finalCheck == $lastNum){
    //성별 출력
    $gender = substr($rrnNum, 6, 1);
    if($gender == 1){
        echo "성별 : 남성<br>";
    }else {
        echo "성별 : 여성<br>";
    }

    //생년월일 출력
    $yearOfBirth    = substr($rrnNum,0, 2);
    $monthOfBirth   = substr($rrnNum, 2,2);
    $dayOfBirth     = substr($rrnNum, 4,2);
    echo "생년월일 : {$yearOfBirth}년 {$monthOfBirth}월 {$dayOfBirth}일<br>";

    //나이(만) 출력
    $today = date('Ymd');
    $age = substr($today, 0,4) - (1900 + $yearOfBirth) + 1;
    $tmp = substr($today, 4,4) - substr($rrnNum, 2, 4);
    //만 나이 계산
    $fullAge = 0;
    if($tmp > 0){
        $fullAge = $age - 1;
    }else {
        $fullAge = $age - 2;
    }
    echo "나이 : {$age}세 (만 {$fullAge}세)";

  // 계산 조건이 false일 경우
} else echo "잘못된 주민번호입니다.";
echo "</div>";
?>