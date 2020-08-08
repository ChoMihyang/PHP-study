<?php

// protected 접근 제어자가 적용되는 곳
// 1. 외부에서 객체를 접근할 때 (X)
// 2. 상속에서 자손클래스에게 물려줄 때 (O)
class A
{
    private     $privateValue   = 30;
    protected   $protectedValue = 31;
    public      $publicValue    = 32;
}

class B extends A{
    function test(){
        echo $this->protectedValue."<br>";
    }
}

$objA = new A();
$objB = new B();

echo $objA->privateValue."<br>";    //ERROR
echo $objA->protectedValue."<br>";  //ERROR
echo $objA->publicValue."<br>";

//echo $objB->privateValue."<br>";    //ERROR
//echo $objB->protectedValue."<br>";  //ERROR
echo $objB->publicValue."<br>";

?>

