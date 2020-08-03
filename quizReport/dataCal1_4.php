<?php
// 총합, 평균, 소팅, 중간값을 각각 변수에 저장
$arraySum   = sum($myArray);
$arrayAvg   = average($myArray);
$arraySort  = sort_bubble($myArray, false);
$arrayMed   = median($myArray);

// 배열 내 원소 값에 대한 총합 반환
function sum($argList){
    $sum = 0;
    foreach ($argList as $value) {
        $sum += $value;
    }
    return $sum;
}
// 배열 원소 값에 대한 평균 반환
function average($argList){
    $avg = round(sum($argList) / count($argList), 2);
    return $avg;
}

// 입력 배열을 버블 소팅을 이용하여 오름차순 또는 내림차순 정렬 후 반환
function sort_bubble(&$argList, $argIsAscendingOrder){
    // true 값을 넘겨 줄 때 : 오름차순
    if($argIsAscendingOrder){
        for ($i = 0 ; $i < count($argList) - 1 ; $i++){
            for ($j = 0 ; $j < count($argList) - 1 - $i ; $j++){
                if($argList[$j] > $argList[$j + 1]){
                    $temp               = $argList[$j];
                    $argList[$j]        = $argList[$j + 1];
                    $argList[$j + 1]    = $temp;
                }
            }
        }
        // fales 값을 넘겨 줄 때 : 내림차순
    } else{
        for($i = 0 ; $i < count($argList) - 1 ; $i++){
            for($j = 0 ; $j < count($argList) - 1 - $i ; $j++){
                if($argList[$j] < $argList[$j + 1]){
                    $temp               = $argList[$j];
                    $argList[$j]        = $argList[$j + 1];
                    $argList[$j + 1]    = $temp;
                }
            }
        }
    }
    // 정렬 결과 배열 반환
   return $argList;
}

// 배열 내 원소값에 대한 중간 값 반환
function median($argList){
    // 배열의 길이가 짝수일 때
    $arrLength = count($argList);
    if($arrLength % 2 == 0){
        $index1 = $argList[($arrLength / 2) - 1];
        $index2 = $argList[($arrLength / 2)];
        $result = ($index1 + $index2) / 2;
        return $result;
    // 배열의 길이가 홀수일 때
    }else{
        $result = $argList[(count($argList) / 2)];
        return $result;
    }
}
?>


