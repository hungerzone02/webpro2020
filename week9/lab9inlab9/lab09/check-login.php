<?php
session_start();
include_once "config.php";
$userQuery="SELECT * FROM systemuser as u inner join employee as e on u.employee_id =
e.employee_id WHERE username like '".$_POST['username']."'";
$result=mysqli_query($connect ,$userQuery);
if(!$result) {
 die ("Could not successfully run the query $userQuery".mysqli_error($connect));
}
if(mysqli_num_rows($result) == 0) {
 $_SESSION['errors_msg'] = "Username or Password is incorrect.";
 header("Location: login.php");
}
else{
 $row = mysqli_fetch_assoc($result);
 if (($_POST['username']==$row['username'])
 && ($_POST['password']==$row['password'])) {
 $_SESSION['username']=$row['username'];
 $_SESSION['firstname']=$row['firstname'];
 $_SESSION['lastname']=$row['lastname'];
 $_SESSION['level']=$row['level'];
 header("Location: index.php");
 }
 else{
 $_SESSION['errors_msg']="Username or Password is incorrect.";
 header("Location: login.php");
 }
}