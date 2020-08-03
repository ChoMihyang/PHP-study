<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>정수들의 총합, 평균, 중간 값, 오름차순 정렬 값 출력</title>
</head>
<body>
<!--입력하고자 하는 데이터 갯수 값 POST-->
<?php
$numOfData = $_POST['numOfData'];
?>
<form action="dataCal1_3.php" method="post">
    <input type="hidden" name="numOfData" value="<?=$numOfData?>">
    <fieldset style="font-size: 20px; width: 300px;">
    <legend>정수 <?=$numOfData?> 개를 입력하시오.</legend>
<!--        반복문을 이용하여 input 태그를 입력한 데이터 갯수 만큼 생성-->
        <?
            $valueCount = 1;
            for($iCount = 0 ; $iCount < $numOfData ; $iCount++){
        ?> 입력 값 <?=$valueCount?>&nbsp;&nbsp;<input type="text" name="array[]" autocomplete="off"><br>
        <? $valueCount++;
            }?>
    <input type="submit" value="입력하기">
</fieldset>
</form>
</body>
</html>
