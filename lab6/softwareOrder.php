<?php 
    $system = $_GET['system'];
    $copies = $_GET['coppies'];
    $subtotal = 35*$copies;
    $tax = findSubtotal($subtotal);
    $shipping = 3.50;
    if($copies >= 5)
    {
        for($i = 0;$i < $copies - 4;$i++)
        {
            $shipping += 0.75;
        }
    }
    $total = number_format($subtotal+$tax+$shipping,1);
    echo "SavetheWorld: Order Derails <br><br>";
    echo "Operating System: $system <br>";
    echo "Number of copies: $copies <br>";
    echo "======================================== <br>";
    echo "Subtotal: $subtotal <br>";
    echo "Tax: $tax <br>";
    echo "Shipping cost: $shipping <br>";
    echo "======================================== <br>";
    echo "Total: $total";
    function findSubtotal($subtotal)
    {
        return number_format($subtotal*0.07,2);
    }

    function findShipping($copies)
    {
        
    }