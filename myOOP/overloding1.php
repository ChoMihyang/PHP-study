<?php
class OverlodingTest{
    function test(){
        echo "test() is invoked <br>";
    }
    function test($arg1, $arg2){
        echo "test({$arg1},{$arg2}) is invoked <br>";
    }
}
$obj = new OverlodingTest();

$obj = test();
$obj->test(1, 2);
?>