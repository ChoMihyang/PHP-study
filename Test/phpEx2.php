
<?php
//global variable, 함수 또는 클래스, 인터페이스 밖에서 선언될 경우
$value_1 = 1; //전역 변수 선언, 접근 가능 범위 : line4 ~ 파일 끝까지
                //변수 호이스팅 기능 지원하지 않음

{ $value_2 = 2; } //block-level scope지원하지 않음

//흐름제어문 내 선언 변수 -> 전역 변수
for($i = 0 ; $i < 2 ; $i++){
    echo $i;
}
echo $i;

?>
<?php
echo $value_2; //2
    ?>

<?php
    $value = "전역변수:value";

    function foo(){
        //함수 내에서 선언된 변수는 지역변수이다.
        //함수에서 전역 변수명을 이용해 전역변수 참조 불가
        echo $value; //Notice : Undefined variable~

        //해결방법1)global키워드 이용
        global $value;
        echo $value;
        //해결방법2) $GLOBALS 슈퍼 전역 함수 이용(추천)
        echo $GLOBALS["value"];
    }
    foo();

?>
<?php

function foo1(){
    //지역변수 : 함수 내 선언된 변수
    // 즉 함수 내 변수 참조 시 함수 내 선언된 변수만 참조
    // 지역변수 접근 범위 -> 시작 : 변수 선언 / 종료 : 함수 종료

    $value_3 = "지역변수1";

    {
        $value_4 = "지역변수2";
    }

    echo $value_3;
    echo $value_4; //지역변수2 <- 블록레벨스콥 지원X
}
    foo1();
?>
