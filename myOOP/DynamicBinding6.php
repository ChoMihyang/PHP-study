<?php

class A{
    const c_v = 18;
    public $i_v = 19;
    static $s_v = 20;

    function test()
    {
        echo static::$s_v . "<br>";
    }
}

class B extends A{
    static $s_v = 30;

    function test(){
        echo parent::test();
        echo self::$s_v."<br>";
    }
}
$b = new B();
$b->test();

?>

