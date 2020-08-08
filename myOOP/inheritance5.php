<?php

class A{
    function __construct(){
        echo "A's constructor is invoked.<br>";
    }

    function __destruct(){
        echo "A's destructor is invoked.<br>";
    }
}

class B extends A {
    function __construct(){
        echo "B's constructor is invoked.<br>";
    }

//    function __destruct(){
//        echo "B's destructor is invoked.<br>";
//    }

}

class C extends B{
    function __construct(){
        echo "C's constructor is invoked.<br>";
    }

//    function __destruct(){
//        echo "C's destructor is invoked.<br>";
//    }
}

$objA = new C();
?>


