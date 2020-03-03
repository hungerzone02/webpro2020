<?php
require_once "config.php";

$userQuery = "SELECT * from travel";
$result = mysqli_query($connect,$userQuery);

if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

if(mysqli_num_rows($result) == 0)
{
    echo "No records were found with query $userQuery";
    echo "<p><a href=\"travel.html\">Add a new record</a></p>";
}
else
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <p><a href="travel.html">Add a new record</a></p>
    <table border = "1">
        <tr><th>Destination</th><th>Number of nights</th><th>Number of People</th><th>Hotel Price</th><th>Ticket Price</th><th>Total Price</th>
        <th>Update</th><th>Delete</th></tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
 ?>
         <tr>
         <td><?php echo $row['Destination']?></td>
         <td><?php echo $row['NumberOfNights']?></td>
         <td><?php echo $row['NumberOfPeople']?></td>
         <td><?php echo $row['HotelPrice']?></td>
         <td><?php echo $row['TicketPrice']?></td>
         <td><?php echo $row['TotalPrice']?></td>
         <td><a href="./update_data.php?id=<?php echo $row['travel_ID'];?>">Update</a></td>
         <td><a href="./delete_data.php?id=<?php echo $row['travel_ID'];?>">Delete</a></td>
         </tr>
    </body>
    </html>
 <?php
}
}
?>