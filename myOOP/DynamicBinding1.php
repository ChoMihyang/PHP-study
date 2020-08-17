<?php

class A{
    public $i_v = "i_v 1";
    const c_v = "c_v 1";
    static $s_v = "s_v 1";

    public function test(){
        echo $this->i_v."<br>";
        echo self::$s_v."<br>";
    }
}

class B extends A{
    public $i_v = "i_v 2";
    const c_v = "c_v 2";
    static $s_v = "s_v 2";

    function ycj(){
        echo self::$s_v."<br>";
        parent::test();
    }
}
$b = new B();
$b ->ycj();

?>