<?php
session_start();
require_once "config.php";
$a1 = $_POST['a'];
$a2 = $_POST['b'];
$sql="SELECT * FROM test WHERE uname = '$a1' AND pword = '$a2' ";
$query = mysqli_query($connect,$sql);
if(mysqli_num_rows($query) > 0)

{
    $row = mysqli_fetch_assoc($query);
    $u=$row['uname'];
    $p=$row['pword'];
    $l=$row['level'];
    $_SESSION['level']=$l;
    header("Location: show_faculty.php");
    }
    else
    {
    $_SESSION['warning'] = 'Username or password are not correct. Please try again !!!!!!!';
    header("Location: login.php");
    }
    mysqli_close($connect);
    ?>
