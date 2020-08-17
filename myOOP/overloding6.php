<?php
class Variables{
    public function __construct(){
    if(session_id() === ""){
        session_start();
    }
}
public function __set($name, $value){
    $_SESSION['Variables'] [$name] = $value;
}
public function &__get($name){
    return $_SESSION['Variables'][$name];
}
public function __isset($name)
{
    return isset($_SESSION["Variables"] [$name]);
}
}
$obj = new Variables();
$obj->user_name = "초리";
$obj->user_id = 1234567;
?>