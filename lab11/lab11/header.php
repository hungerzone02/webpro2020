<?php session_start(); ?>
<div class="header">
    <h1>Web Database System</h1>
    <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="position-mgr.php">Position</a></li>
        <li><a href="department-mgr.php">Department</a></li>
        <li><a href="system-user-mgr.php">System-user</a></li>
        <li><a href="employee-mgr.php">Employee</a></li>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<li><a href="logout.php">Logout</li>';
        }
        else {
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
    </ul>
</div>
