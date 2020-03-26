
ไฟล์ config.php
<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "ชื่อ Database";

$connect = mysqli_connect($server,$user,$password,$dbname);

if(!$connect)
{
    die("ERROR: Cannot connect to the database $dbname on server $server
    using username $user (".mysqli_connect_errno().",".mysqli_connect_error().")");
}
?>








