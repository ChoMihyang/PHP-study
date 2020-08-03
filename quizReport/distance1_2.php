<?php
// radio 타입의 세 항목 중 하나를 선택하여 name값을 POST,
// POST된 항목의 value값을 변수에 저장
$planetName = $_POST['planet'];
// 태양에서 각 행성(key)까지의 거리(value)를 배열로 저장
$distance = [
            "mercury" => 5790,
            "earth" => 15000,
            "mars" => 23000
            ];

// 계산 과정
// 1) 수성(mercury) 선택 시
if($planetName == "mercury"){
    $disValue = TraveTime($planetName, $distance);
    result($planetName, $disValue);
    // 2) 지구(earth) 선택 시
}else if($planetName == "earth"){
    $disValue = TraveTime($planetName, $distance);
    result($planetName, $disValue);
    // 3) 화성(mars) 선택 시
}else if($planetName == "mars"){
    $disValue = TraveTime($planetName, $distance);
    result($planetName, $disValue);
}
// 최종 결과를 출력하는 함수 -> 행성이름과 거리값을 매개함
function result($planetName, $disValue) {
    echo "Trave time from Sun to {$planetName} : {$disValue} minutes";
}
// 태양으로부터 각 행성까지의 거리를 계산 -> 행성이름과 거리를 저장한 배열을 매개함
function TraveTime($planetName, $distance) {
    return round($distance["$planetName"] / 30 * (1 / 60), 2);
}

?>