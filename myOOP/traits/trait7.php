<?php

trait Arms
{
    private $itemL = "[trait:Arm] 왼손";
    private $itemR = "[trait:Arm] 오른손";
    private $itemT = "[trait:Arm] 무장";

    function prtArms()
    {
        echo $this->itemL . ":";
        echo $this->itemR . "<br>";
    }
}

trait HF
{
    private $itemH = "[trait:HF] 머리";
    private $itemF = "[trait:HF] 다리";

    function prtHead()
    {
        echo $this->itemH . "<br>";
    }

    function prtFoot()
    {
        echo $this->itemF . "<br>";
    }
}

trait tbody
{
    function prtBody()
    {
        echo "[trait: body]: 몸체<br>";
    }
}

class cbody
{
    function prtBody()
    {
        echo "[class: body]: 몸체<br>";
    }
}

class Gundam extends cbody
{
    use HF, Arms, tbody;

    function printAll()
    {
        $this->prtFoot();
        $this->prtArms();
        $this->prtHead();

        echo "무장" . $this->itemT . "<br>";
    }
}

$obj = new Gundam();
$obj->printAll();


?>