<?php
session_start();
require_once "config.php";
$fac_ID = $_GET['id']; //get $id from an update link
if($_SESSION['level'] == 2)
{
$userQuery = "DELETE FROM faculty WHERE fac_ID = $fac_ID";
$result = mysqli_query($connect,$userQuery);
if (!$result)
{
die ("Could not successfully run the query $userQuery".mysqli_error($connect));
}
else
{
echo "Successfully deleted the record<br><br>";
echo "<a href=\"show_faculty.php\">Go back to display all faculty</a>";
}
}
else
{
echo "Can not delete,please login as an admin<br><br>";
echo "<a href=\"login.php\">Click here to login</a>";
}
?>