<?php
/*class OverlodingTest{
    function __call($name, $parameters){
        echo $name."(";
        foreach($parameters as $value)
            echo $value.",";
        echo ")<br>";
    }
}
$obj = new OverlodintTest();

$obj->test(1, "two", 3.0);*/

class OverlodingTest{
    static function __callStatic($name, $parameters){
        echo $name."(";
        foreach($parameters as $value)
            echo $value.",";
        echo ")<br>";
    }
}

OverloadingTest::test(1, "two", 3.0);

//$obj = new OverlodingTest();
//$obj->test();
//$obj->test(1, 2);
?>