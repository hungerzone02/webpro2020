<?php
require_once "config.php";

$product_id = $_GET['product_id'];

$userQuery = "DELETE from product where productID = $product_id";

$result = mysqli_query($connect,$userQuery);

if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($connect));
}

else
{
    echo "Successfully to deleted the product<br><br>";
    header("Location: ./display_product.php", true, 301);
}

?>