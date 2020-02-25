<?php
require_once "config.php";

$userQuery = "select * from product";
$result = mysqli_query($connect,$userQuery);

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
    echo "<p><a href=\"form_add_product.html\">Add a new product</a></p>";
    echo "<table border = \"1\">";
    echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th></tr>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr><td>".$row['productName']."</td><td>"
        .$row['price']."</td><td>"
        .$row['qty']."</td>";
        echo "<td><a href=\"update_product.php?id=".$row['productID']."\">Update</a></td>";
        echo "<td><a href=\"delete_product.php?product_id=".$row['productID']."\">Delete</a></td>";
    }
    echo  "</table>";
}

mysqli_close($connect);
?>