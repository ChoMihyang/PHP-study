<?php

class A{
    private static $ObjRef = null;
    private function __construct(){
        echo "A's constructor is invoked<br>";
    }

    // 외부에서 접근하기 위해 클래스 메서드 선언
    // 아래 클래스 메서드 호출 시 A 클래스 객체 반환
    public static function getObject(){
        // A 클래스의 객체를 반환하는 프로그램 작성
        // 단 A 클래스 객체는 단 한 개만 존재
        if(self::$ObjRef == null){
            self::$ObjRef = new A();
        }
        return self::$ObjRef;
    }
    function printMyName(){
        echo __METHOD__."<br>";
    }
}
//new A(); //생성자의 접근제어자가 private 일 경우 new 연산자를 이용해서 객체를 생성할 수 없다.

$objA = A::getObject();
$objA->printMyName();


//$objB = A::getObject();

//if($objA == $objB)
//    echo "true";
//else
//    echo "false";
?>
