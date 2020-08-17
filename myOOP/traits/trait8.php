<?php
trait Hello{
    public function sayHelloWorld(){
        echo "Hello".$this->getWorld();
    }
    // 추상 메서드 선언
    abstract public function getWorld();
}

class MyHelloWorld{
    // MyHelloWorld 클래스의 멤버 변수
    private $world;
    // trait 삽입
    use Hello;
    // trait 의 추상 메서드 구현
    public function getWorld(){
        return $this->world;
    }
    // MyHelloWorld 클래스의 멤버 메서드
    public function setWorld($val){
        $this->world = $val;
    }
}

$obj = new MyHelloWorld();
$obj->setWorld("bar");
$obj->sayHelloWorld();
?>