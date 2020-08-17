<?php

class OverloadingTest{
    function __set($name, $arg){
        print $name.":".$arg."<br>";
    }
    function __get($name){
        print $name."<br>";
    }
}

$obj = new OverlodingTest();
$obj->test = 18;

$var_a = $obj->opnet;
?>