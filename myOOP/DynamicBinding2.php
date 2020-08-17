<?php

class A{
    function test(){
        echo "A's test() <br>";
    }
    function callTest(){
        $this->test();
    }
}
class B extends A{
    function test(){
        echo "B's test() <br>";
    }
}

$b = new B();
$b->callTest();
?>