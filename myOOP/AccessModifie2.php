<?php

class A{
    private     $privateValueA      = "A18";
    protected   $protectedValueA    = "A218";
    public      $publicValueA        = "A21818";

    public function AMTest(A $argA, B $argB){
        echo $argA->privateValueA."<br>";
        echo $argA->protectedValueA."<br>";
        echo $argA->publicValueA."<br>";

//        echo $argB->privateValueB."<br>";
//        echo $argB->protectedValueB."<br>";
        echo $argB->publicValueAB;
    }
}
class B{
    private     $privateValueB      = "B18";
    protected   $protectedValueB    = "B218";
    public      $publicValueAB      = "B21818";
}

$objA1 = new A();
$objA2 = new A();
$objB  = new B();

$objA1->AMTest($objA2, $objB);

?>


