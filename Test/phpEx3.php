<?php

$value1 = 1;
$value2 = 2.0;
$value3 = true;
$value4 = "1";
$value5 = null;

//integer + float = float
$result = $value1 + $value2;
var_dump($result);

//integer + boolean = integer
// true = 1, false = 0 으로 연산
$result = $value1 + $value3;
var_dump($result);

//integer + string = integer
//문자열의 첫 글자가 숫자일 경우 파싱 가능한 범위까지 번역 후 정수로 반환
//문자열의 첫 글자가 문자일 경우 0 반환
$result = $value1 + $value4;
var_dump($result);

$result = $value1 + "1234god";
var_dump($result);

$result = $value1 + "god111";
var_dump($result);

$result = $value1 + "1.6";
var_dump($result);

//integer + null = integer
//null은 0 으로 연산
$result = $value1 + $value5;
var_dump($result);


echo (($value1 == $value4) ? "true" : "false")."<br>";
echo (($value1 === $value4) ? "true" : "false")."<br>";

echo (($value1 <> $value2) ? "true" : "false")."<br>";
echo (($value1 <> $value3) ? "true" : "false")."<br>";

echo (($value1 !== $value3) ? "true" : "false")."<br>";
echo (($value1 !== $value2) ? "true" : "false")."<br>";

echo (1 <=> 1)."<br>";
echo (1 <=> 2)."<br>";
echo (2 <=> 1)."<br>";

?>