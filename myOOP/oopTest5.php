<?php
class CIR{
    private static $age     = 24;
    private static $name    = "조미향";

    public static function printName(){
        echo CIR::$name . "<br>";
    }

    public function printAge(){
        echo CIR::$age . "<br>";
    }

    public static function printInfo(){
        CIR::printName();
        CIR::printAge();
    }
}
?>


