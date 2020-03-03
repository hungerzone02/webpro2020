<?php
require_once "config.php";

$travel_ID = $_GET['id'];

$userQuery = "DELETE FROM travel WHERE travel_ID = $travel_ID";
$result = mysqli_query($connect,$userQuery);

if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}
else
{
    echo "Successfully deleted the record<br><br>";
    header("Location: ./display_report.php", true, 301);
}
?>