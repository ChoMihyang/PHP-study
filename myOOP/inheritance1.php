<?php

class A{
    public $name;

    public function __construct($argName){
        $this->name = $argName;
    }
    public function prtName(){
        echo $this->name;
    }
}
class B extends A
{
    public $age;

    public function __construct($argName, $argAge)
    {
        parent::__construct($argName);
        $this->age = $argAge;
    }
}
$value = new B("조미향", 24);
$value->prtName();
?>


