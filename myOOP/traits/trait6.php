<?php
// traits method visibility 변경
trait A{
    private $pv = 1818;
    private function test1(){
        echo "A::test1()";
    }
    private function test2(){
        echo "A::test2()";
    }
}
class Main{
    use A{
        pv as public;
        test1 as public;
        test2 as public;
    }
}
$obj = new Main();
$obj->test1();
$obj->test2();
echo $obj->pv."<br>";

?>