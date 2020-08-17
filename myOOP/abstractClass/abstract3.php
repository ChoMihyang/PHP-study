<?php
abstract class A{
    abstract function getValue();
}
abstract class B extends A{}

class C extends B{
    function getValue()
    {
        echo "Print GV";
    }
}
$Obj = new C();
$Obj->getValue();