<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>구구단 테스트</title>
    <style>
        div{
            display: inline-block;
            width: 200px;
            font-size: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<?php

    $dan = $_POST['value'];

    if(empty($dan)){
    //2부터 9까지 구구단 출력
        for ($i = 2; $i <= 9; $i++) {
            echo "<div>";
            for ($j = 1; $j <= 9; $j++) {
                echo $i . " X " . $j . " = " . ($i * $j). "<br>";
            }
            echo "</div>";
        }
    }else{
        //입력한 단의 구구단 출력
        echo "<div>";
        echo "<{$dan}단>"."<br><br>";
        for($i = 1 ; $i <= 9 ; $i++){
            echo $dan . " X " . $i . " = " . ($dan * $i) . "<br>";
        }
        echo "</div>";
    }
    ?>

</body>
</html>