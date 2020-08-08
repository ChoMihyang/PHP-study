<?php
class A{
    function printMyName(){
        echo __CLASS__;
    }
}

class B extends A {
    function printMyName(){
        echo __CLASS__;
    }
}

class C extends A{
    protected function printMyName(){
        echo __CLASS__;
    }
}

$obj = new B();
$objB->printMyName();

$objC = new C();
$objC->printMyName();
?>


