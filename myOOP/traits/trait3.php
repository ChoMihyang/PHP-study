<?php
trait T1{
    function prt(){
        echo "T1111";
    }
}
trait T2{
    function prt(){
        echo "T2";
    }
}
class A{
    use T1;
    function prt(){
        echo "A";
    }

}
class B extends A{
    use T1;
}

$obj = new B;
$obj->prt();
?>