<?php

$nations = $_GET['nations'];
$traveler = $_GET['traveler'];
$nights = $_GET['nights'];
if($nations == "Barcelona")
{
    $airFare = 875;
    $cost = 85;
}
else if($nations == "Cario")
{
    $airFare = 950;
    $cost = 98;
}
else if($nations == "Rome")
{
    $airFare = 875;
    $cost = 110;
}
else if($nations == "Santiago")
{
    $airFare = 820;
    $cost = 85;
}
else if($nations == "Tokyo")
{
    $airFare = 1575;
    $cost = 240;
}
if($nations == "Tokyo" && $nights >=5)
{
    $airFare -= 200;
}
$sumAirFare = $airFare*$traveler;
$sumCost = $cost*$nights;
$total = findTotal($sumAirFare,$sumCost);
$sumAirFare = number_format($sumAirFare,2);
$sumCost= number_format($sumCost,2);
$total = number_format($total,2);
function findTotal($sumAirFare,$sumCost)
{
    return $sumAirFare+$sumCost;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="travel.css">
    <title>Document</title>
</head>
<body class="travelPHP">
    <h1>Travel Reservation Form</h1>
    <table>
    <tr>
        <td>Destination: <?php echo $nations?><br>
        Number of people: <?php echo $traveler?><br>
        Number of nights: <?php echo $nights?><br>
        Airline Tickets: $<?php echo $sumAirFare?><br>
        Hotel many nights will you be staying: $<?php echo $sumCost?><br><br>
        <p><b>TOTAL COST: $<?php echo $total;?><b></p>
    </td>
    </tr>
    </table>
</body>
</html>