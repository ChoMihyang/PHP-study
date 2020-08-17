<?php
// Scope resolution operator :: (<->  ->)
// 객체 또는 클래스의 멤버를 접근하기 위해
// 모두 메서드는 클래스 메서드, 인스턴스 둘 다 접근 가능

// 멤버 변수 접근 시 차이점 발생
// -> 인스턴스 멤버 변수만 접근 가능
// :: 클래스 멤버 변수만 접근 가능

// 참조하고자하는 객체 또는 클래스의 주소 :: 참조 멤버
// 좌항 키워드 : self, parent, 클래스 이름, static
// 우항 : 접근하고자하는 멤버 이름
// 클래스 멤버와 인스턴스 메서드만 해당
// 인스턴스 멤버는 사용 불가능

class A{
    public $value = 2;

    function prtSomething(){
        echo self::$value; // ::를 이용해서 우항에 접근하는 멤버의 타입이 인스턴스? -> X
    }
}

$obj = new A();
$obj->prtSomething();