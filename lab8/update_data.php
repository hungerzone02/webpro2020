<?php
require_once "config.php";

$travel_ID = $_GET['id'];

$userQuery = "SELECT * FROM travel WHERE travel_ID = '$travel_ID'";
$result = mysqli_query($connect,$userQuery);

if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}
else
{
    echo "Update data<br><br>";
    while($row = mysqli_fetch_assoc($result))
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
            <from method="post" action="update_data_submit.php?id=<?php echo $travel_ID;?>">
            <table width="416" border="0">
                <tr>
                    <td width="160">Travel ID</td>
                    <td width="246">Auto_Increment</td>
                </tr>
                <tr>
                    <td>Destination</td>
                    <td><input type="text" name="Destination" value="<?php echo $row['Destination'];?>"></td>
                </tr>
                <tr>
                    <td>Number of nights</td>
                    <td><input type="text" name="NumberOfNights" value="<?php echo $row['NumberOfNights'];?>"></td>
                </tr>
                <tr>
                    <td>Number of people</td>
                    <td><input type="text" name="NumberOfPeople" value="<?php echo $row['NumberOfPeople'];?>"></td>
                </tr>
                <tr>
                    <td>Hotel Price</td>
                    <td><input type="text" name="HotelPrice" value="<?php echo $row['HotelPrice'];?>"></td>
                </tr>
                <tr>
                    <td>Ticket Price</td>
                    <td><input type="text" name="TicketPrice" value="<?php echo $row['TicketPrice'];?>"></td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td><input type="text" name="TotalPrice" value="<?php echo $row['TotalPrice'];?>"></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" name="button" value="Submit"></td>
                    <td><input type="reset" name="button2" value="Cancel"></td>
                </tr>
    </table>
        </form>
        </body>
        </html>
        <?php
    }
}
?>