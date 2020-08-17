<?php
abstract class AbstractClass{
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    public function printOut(){
        print $this->getValue()."\n";
    }
}

?>