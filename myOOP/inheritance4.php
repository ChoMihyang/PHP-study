<?php
class A{
    protected $name = "조미향";

    public function printName(){
        echo $this->name."<br>";
    }
}

class B extends A {
    protected $age = 24;

    public function printAge(){
        echo $this->age."<br>";
    }

    public function printInfo(){
        $this->printName();
        $this->printAge();
    }
}
$obj = new B();
$obj->printInfo();

?>


