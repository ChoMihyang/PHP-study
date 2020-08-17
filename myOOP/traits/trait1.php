<?php
trait IGoMoYa{
    private $test = "test i-variable";

    function __construct()
    {
        echo "IGoMoYa's constructor is invoked!!<br>";
    }
    function __destruct()
    {
        echo "IGoMoYa's destruct is invoked!!<br>";
    }
    function test()
    {
        echo "IGoMoYa's test() is invoked!!<br>";
    }
}
class Main{
    use IGoMoYa;
}
echo "It's show time!!<br>";
$obj = new Main();
$obj = test();
?>

