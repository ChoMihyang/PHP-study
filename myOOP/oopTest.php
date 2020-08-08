<?php
// 클래스 정의
class Ptest{
    public $value;

    function prtValue(){
        $this->value;
    }
}
class MyFirstClass extends Ptest{
    // 멤버 변수(속성:property)선언
    private $name;

    // 생성자(constructor) 선언
    function __construct($argName)
    {
        $this->name = $argName;
    }

    // 메서드 선언
    function printMyName(){
        echo $this->name;
    }
}
// MyFirstClass의 객체 생성
$mfc = new MyFirstClass("조미향");
// 생성된 객체의 메서드 호출
$mfc->printMyName();
?>