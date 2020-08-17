<?php
class OtherClass extends MyClass {
    public static $my_static = 'static var';

    public static function doubleColon(){
        echo parent::CONST_VALUE."\n";
        echo self::$my_static."\n"; // 현재 클래스(범위)를 지칭
    }
}

$classname = 'OtherClass';
echo $classname::doubleColon(); // php 5.3.0 ~

OtherClass::doubleColon();