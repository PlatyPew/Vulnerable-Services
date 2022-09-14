<!DOCTYPE html>
<?php
    session_start();
    include "head.inc.php";
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"></a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        
        <?php
        
            if (isset($_SESSION["email"]) && isset($_SESSION["pwd"]) && $_SESSION["email"] === "king@gmail.com") {
                echo "<li><a class='nav-link' title='Search' href='home.php'>"
                . "<i class='material-icons'>search</i></a></li>";
                echo "<li><a class='nav-link' title='Upload' href='upload.php'>"
                . "<i class='material-icons'>file_upload</i></a></li>";
                echo "<li><a class='nav-link' title='Sign Out' href='logout.php'>"
                . "<i class='material-icons'>logout</i></a></li>";
                
            } else if (isset($_SESSION["email"]) && isset($_SESSION["pwd"])) {
                echo "<li><a class='nav-link' title='Search' href='home.php'>"
                . "<i class='material-icons'>search</i></a></li>";
                echo "<li><a class='nav-link' title='Sign Out' href='logout.php'>"
                . "<i class='material-icons'>logout</i></a></li>";
            
            } else {
                echo "<li class='nav-item'>
                    <a class='nav-link' href='register.php'>Register</a>
                </li>";
            }
        ?>
    </ul>
</nav>
