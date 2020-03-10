<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php
require_once "header.php";
?>

<div class="main-content">
    <?php
        if (isset($_SESSION['errors_msg'])) {
            echo '<h3 class="error">'.$_SESSION['errors_msg'].'</h3>';
            unset($_SESSION['errors_msg']);
        }
    ?>
    <div class="login-frm">
        <form action="check-login.php" method="POST">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="login-btn">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include_once "footer.php"?>

</body>
</html>