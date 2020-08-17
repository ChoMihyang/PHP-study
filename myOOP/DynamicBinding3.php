<?php

class A{
    static function test(){
        echo "A's test() <br>";
    }
    function callTest(){
        $this->test();
    }
}
class B extends A{
    static function test() {
        echo "B's test() <br>";
    }
}

$b = new B();
$b->callTest();
?>