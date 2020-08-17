<?php
class A{
    function __set($name, $value){
        echo "모르는 멤버 변수가 들어 왔어 이름은? : ".$name."<br>";
        echo "값은? : ".$value."<br>";
    }
    function __get($name){
        echo "모르는 멤버 변수를 읽어 오래...이름은? : ".$name."<br>";
    }
}
$obj = new A;
$obj->name = "ycjung"; // SET

echo $obj->name; // GET