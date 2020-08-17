<?php
trait T1{
    function prt(){
        echo "T1";
    }
}
trait T2{
    function prt(){
        echo "T2";
    }
}
class A{
//    function prt(){
//        echo "A";
//    }
}
//class B extends A{
//    use T1, T2;
//}
$obj = new B;
$obj->prt();
?>