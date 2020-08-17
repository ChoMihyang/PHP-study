<?php

trait TraitTest{
    function test1(){
        echo "[trait: test()1]<br>";
    }
    function test2(){
        echo "[trait: test()2]<br>";
    }
}
class base{
    function test2(){
        echo "[trait: test()2]<br>";
    }
}
class Main{
    use TraitTest;

    function test1(){
        echo "[Main class: test()2]<br>";
    }
}
$obj = new Main();
$obj->test1();
$obj->test2();
?>