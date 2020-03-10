<?php
session_start();

require_once "config.php";

if(isset($_SESSION['level']))
{
    $userQuery = "SELECT * FROM faculty";
    $result = mysqli_query($connect,$result);
    if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

if(mysqli_num_rows($result) == 0)
{
    echo "No records were found with query $userQuery";
    
}
else
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Faculty</title>
    </head>
    <body>
        <table cellspacing="0" border="1">
            <tr bgcolor="#D4DFFF">
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </table>
    </body>
    </html>
    <?php while($row = mysqli_fetch_assoc($result))
    {
        ?><!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <table>
            <tr>
                <td><?php echo $row['fac_ID']?></td>
                <td><?php echo $row['fac_name']?></td>
                <td><a href="update_data.php">Update</a></td>
                <td><a href="delete_data.php">Delete</a></td>
            </tr>
            </table>
        </body>
        </html>
        <?php
    }
}?>
<html>
    <body>
        <a href="add_fac.php">Add new record</a><br><br>
    </body>
</html>
<?php
mysqli_close($connect);
}
else
{
    echo "Can not show data,please login<br><br>";
    echo "<a href=\"login.php\">Click here to login</a>";
}
echo "<a href=\"Logout.php\">Logout</a>";
?>

