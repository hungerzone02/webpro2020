<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php
require_once "header.php";
require_once "config.php";
?>
<h2>Department Management</h2>
<div class="main-content">
    <?php

    $userQuery="SELECT count(*) as total from employee";
    $result=mysqli_query($connect, $userQuery);
    $row=mysqli_fetch_assoc($result);
    $count=$row['total'];
    $userQuery="SELECT * FROM employee";
    $result=mysqli_query($connect ,$userQuery);
    if(!$result) {
        die ("Could not successfully run the query $userQuery".mysqli_error($connect));
    }
    ?>
        <a href="#">Create new employee</a><br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) == 0) {
            echo "<td colspan='3'>No records were found</td>";
        } else {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "    <td>".$row['employee_id']."</td>";
                echo "    <td>".$row['firstname']."</td>";
                echo "    <td>".$row['lastname']."</td>";
                echo "    <td>".$row['salary']."</td>";
                echo "    <td><a href='#'>Edit</a>&nbsp;&nbsp;<a href='#'>Delete</a></td>";
                echo "</tr>";
            }
        }?>
        <tr>
            <td colspan="5"><?=$count?> Recourds</td>
        </tr>
    </table>
</div>
</body>
</html>
