<?php
require_once "config.php";

$product_id = $_GET['id'];

$userQuery = "SELECT * from product where productID = '$product_id'";
$result = mysqli_query($connect,$userQuery);

if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

else
{
    echo "Update product<br><br>";
    while($row = mysqli_fetch_assoc($result))
    {
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
            <form name="form1" method="post" action="update_product_submit.php?id=<?php echo $product_id;?>">
            <table width="416" border="0">
                <tr>
                    <td width="160">Product ID</td>
                    <td width="246">Auto_Increment</td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="productName" value="<?php echo $row['productName'];?>"></td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td><input type="text" name="price" value="<?php echo $row['price'];?>"></td>
                </tr>
                <tr>
                    <td>Product Quantity</td>
                    <td><input type="text" name="qty" value="<?php echo $row['qty'];?>"></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" name="button" value="Submit"></td>
                    <td><input type="reset" name="button2" value="Cancel"></td>
                </tr>
            </table>
        </form>
        </body>
        <?php
        }
            }
            ?>