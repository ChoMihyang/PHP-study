<?php
// 각 text 타입에 입력한 정수값을 POST하여 변수에 저장
$value1 = $_POST['value1'];
$value2 = $_POST['value2'];
$value3 = $_POST['value3'];
$value4 = $_POST['value4'];
$value5 = $_POST['value5'];
// 반복문 계산을 위해 5개의 값을 배열에 저장
$values = [
            "input1" => "$value1",
            "input2" => "$value2",
            "input3" => "$value3",
            "input4" => "$value4",
            "input5" => "$value5"
            ];
// 평균, 분산, 표준편차 변수 선언과 초기화
$average = 0;
$variance = 0;
$staDviation = 0;

//출력 1) 입력 값
echo "입력 값 : ";
// foreach반복문을 사용하여 배열을 반복
foreach ($values as $key => $value){
    echo $value . "\t";
}
echo "<br>";

//출력 2) 평균
$average = (array_sum($values) / 5);
echo "평균 : " . $average . "<br>";

//출력 3) 분산
foreach ($values as $key => $value){
    $variance += pow($value - $average, 2) / 4;
}
echo "분산 : " . round($variance) . "<br>";

//출력 4) 표준편차
$staDviation = sqrt($variance);
echo "표준편차 : " . round($staDviation, 2);

?>