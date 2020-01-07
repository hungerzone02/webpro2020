<?php

$lenght = $_GET['roomLenght'];
$width = $_GET['roomWidth'];
$height = $_GET['roomHeight'];

$area = 2*($lenght * $width) + $height*(2*($lenght + $width));
$hours = $area/200;
$color = round($area/400)*17;
$pay = $hours * 25;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Area</td>
            <td><?php echo $area ?></td>
        </tr>
        <tr>
            <td>Hour</td>
            <td><?php echo $hours?></td>
        </tr>
        <tr>
            <td>Color</td>
            <td><?php echo $color?></td>
        </tr>
        <tr>
            <td>Pay</td>
            <td><?php echo $pay?></td>
        </tr>
    </table>
</body>
</html>