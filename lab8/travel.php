<?php
require_once "config.php";

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


$HotelPrice = $airFare*$traveler;
$TicketPrice = $cost*$nights;
$total = $HotelPrice + $TicketPrice;














$userQuery = "INSERT INTO travel(Destination,NumberOfNights,NumberOfPeople,HotelPrice,TicketPrice,TotalPrice) 
VALUES('$nations',$nights,$traveler,$HotelPrice,$TicketPrice,$total)";
$result = mysqli_query($connect,$userQuery);

if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}
else
{
    echo "Successfully to add the data<br><br>";
    header("Location: ./display_report.php", true, 301);
}

?>