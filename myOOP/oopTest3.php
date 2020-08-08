<?php
class CI{
    private static $classValue = 1;

    public static function printClassName(){
        echo __CLASS__ . "<br>";
    }

    public function printClassValue(){
        echo CI::$classValue . "<br>";
    }

    public function increaseClassValue(){
        CI::$classValue++;
    }
}

CI::printClassName();
$objA = new CI();
$objB = new CI();

$objA->increaseClassValue();
$objB->printClassValue();
?>


