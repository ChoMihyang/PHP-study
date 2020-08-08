<?php

class CIR{
    private static  $age = 24;
    private         $name = "조미향";

    public static function printName(){
//        echo $this->name . "<br>";
    }

    public function printAge(){
        echo CIR::$age . "<br>";
    }

    public static function printInfo(){
        CIR::printName();
//        $this->printAge();
    }
}

CIR::printInfo();

$objA = new CIR();
$objA->printAge();
?>

