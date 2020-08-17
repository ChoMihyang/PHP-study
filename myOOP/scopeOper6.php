<?php

class A{
    public function test(){
        echo $this->i_v."<br>";
        echo self::c_v."<br>";
    }
}

class B extends A{
    public $i_v = "bar";
    const c_v = "foo";
}

$obj1 = new B();
$obj1->test();