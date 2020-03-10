<?php
session_start();

if(isset($_SESSION['warning']))
{
    echo "<p align='center'><font color='FF0000'><B>".$_SESSION['warning']."</B></font></p>";

    unset($_SESSION['warning']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="check_login.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="a"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="b"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Submit">
                <input type="reset" name="button2" id="button2" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>