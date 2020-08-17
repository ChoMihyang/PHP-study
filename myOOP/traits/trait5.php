<?php
trait A{
    public function smallTalk(){
        echo 'a';
    }
    public function bigTalk(){
        echo 'A';
    }
}
trait B{
    public function smallTalk(){
        echo 'b';
    }
    public function bigTalk(){
        echo 'B';
    }
}
trait C{
    public function smallTalk(){
        echo 'c';
    }
    public function bigTalk(){
        echo 'C';
    }
}
//class Talker{
//    use A, B;
//}

class Talker{
    use A, B, C {
        A::smallTalk insteadof B, C;
        B::bigTalk insteadof A, C;
    }
}
$obj = new Talker();
$obj->smallTalk();
$obj->bigTalk();

?>