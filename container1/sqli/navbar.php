<!DOCTYPE html>
<?php
    session_start();
?>


<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"></a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
        </li>
        <?php
            if (isset($_SESSION["student_id"])) {
                echo "<li><a class='nav-link' href='logout.php'>Logout</a></li>";
            }
        ?>
    </ul>
</nav>
