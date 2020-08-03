<?php
// 랜덤 값을 배열에 저장하는 함수 생성
function setRandIntNum($argNumOfGRandNum, $argFrom, $argTo, $argAllowDuplicatedValue)
{
    $argList = [];
    //$argAllowDuplicatedValue의 값이 true일 경우 중복 값 허용
    if ($argAllowDuplicatedValue) {
        for ($i = 0; $i < $argNumOfGRandNum ; $i++) {
            $argList[$i] = rand($argFrom, $argTo);
        }
        //$argAllowDuplicatedValue의 값이 false일 경우 중복 값 허용X
    } else {
        for ($i = 0; $i < $argNumOfGRandNum ; $i++) {
            $argList[$i] = rand($argFrom, $argTo);
            // 이전의 값과 비교하여 중복된 값이 반환될 경우 인덱스 값을 -1한 뒤 다시 랜덤값을 얻는다.
            for ($j = 0; $j < $i; $j++) {
                if ($argList[$j] === $argList[$i]) {
                    $i--;
                    break;
                }
            }
        }
    }
    //완성된 랜덤 값 배열 반환
    return $argList;
}

//배열 값 내 요소들의 합을 구하는 함수
function sum($argList)
{
    $resultSum = array_sum($argList);
    return $resultSum;
}

//배열 값 내 요소들의 평균을 구하는 함수
function average($argList)
{
    $resultAvg = sum($argList) / count($argList);
    return $resultAvg;
}
// 랜덤 값 배열을 반환하는 함수를 호출하여 변수에 저장
$myList = setRandIntNum(4, 1, 10, false);
// 합과 평균 함수 호출 후 반환값을 변수에 저장
$sum = sum($myList);
$average = average($myList);

//출력문 msg생성
echo "발생된 난수 값 : ";
foreach ($myList as $value)
    echo $value . " ";
echo "<br>";
echo "난수 총 합 : {$sum} <br>";
echo "난수 평균 : {$average} <br>";

?>