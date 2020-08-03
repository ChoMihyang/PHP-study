
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            height: 20px;
        }
        table, th, td{
            border: 1px solid black;
        }
        tr{
            text-align : center;
        }
        td:nth-child(odd){
            font-weight: bold;
            width: 180px;
        }
        td:nth-child(even){
            width: 300px;
        }
    </style>
</head>
<body>
<!--입력한 정수를 배열로 POST-->
<?php $myArray = $_POST['array']; ?>
<!--출력 결과 테이블 생성-->
<table>
    <th colspan="2">계 산 결 과</th>
    <tr>
        <td>입력 값</td>
        <td><?php foreach($myArray as $value){ echo $value . "  "; }?></td>
    </tr>
<!--    총합, 평균, 소팅, 중간값을 계산한 파일을 가져온 후 저장된 변수로 출력하기-->
    <?php
    require_once 'dataCal1_4.php';
    ?>

    <tr>
        <td>총합</td>
        <td><?=$arraySum?></td>
    </tr>
    <tr>
        <td>평균</td>
        <td><?=$arrayAvg?></td>
    </tr>
    <tr>
        <td>중간 값</td>
        <td><?=$arrayMed?></td>
    </tr>
    <tr>
        <td>소팅 후</td>
        <td><?php foreach($arraySort as $value){ echo $value . "  "; }?></td>
    </tr>
</table>
</body>
</html>
