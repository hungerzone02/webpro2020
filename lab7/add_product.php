<?php
require_once "config.php";

$productName = $_GET['productName'];
$price = $_GET['price'];
$qty = $_GET['qty'];
$insertProductName = "INSERT INTO product(productName,price,qty) VALUES('$productName',$price,$qty)";
$result = mysqli_query($connect,$insertProductName);

if(!$result)
{
    die("Could not successfully run the query $insertProductName ".mysqli_error($connect));
}

else
{
    echo "successfully to $insertProductName"."\n";
    header("Location: ./display_product.php", true, 301);
}

