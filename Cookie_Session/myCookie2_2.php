<?php
/*function dataValidation($argDataType, $argData){
    $data = null;

    switch ($argDataType){
        case "POST":
            $data = $_POST;
            break;
        case "COOKIE":
            $data = $_COOKIE;
            break;
    }
    if($data == null) return false;
    foreach($argData as $value){
        if(!isset($data[$value]) || $data[$value] == null)
            return false;
    }
    return true;
}
if(dataValidation("COOKIE", ["name", "age", "dept", "univ", "position"]))
    echo $_COOKIE['name']." : ".$_COOKIE['age']." : ".$_COOKIE['dept']
        ." : ".$_COOKIE['univ']." : ".$_COOKIE['position']." : ".$_COOKIE['otherinfo'];

*/
?>