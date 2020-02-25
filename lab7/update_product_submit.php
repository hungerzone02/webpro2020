<?php
require_once "config.php";

$product_id = $_GET['id'];

$productName = $_POST['productName'];
$price = $_POST['price'];
$qty = $_POST['qty'];

$userQuery = "UPDATE product SET productName = '$productName',
                                    price = $price,
                                        qty = $qty
                                        where productID = '$product_id'";
$result = mysqli_query($connect,$userQuery);

if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

else
{
    echo "Successfully  updated  the product<br><br>";
    header("Location: ./display_product.php", true, 301);
}
