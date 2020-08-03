<?php
    if(isset($_POST['userName']) && isset($_POST['userAge'])) {
        if(empty($_POST['userName']) && empty($_POST['userAge']))
        echo "{$_POST['userName']}님 환영합니다. ";
        echo "저도 {$_POST['userAge']}살 입니다^^";
    }else{
        echo "잘못 입력하셨습니다.";
    }
?>