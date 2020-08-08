<?php

class A{
    function prtSomething(){
        echo $this->test;
    }
}
class B extends A{
    public $test = 3;

}

$obj1 = new B();
$obj1->prtSomething();
?>