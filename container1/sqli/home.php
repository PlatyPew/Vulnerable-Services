<?php
include "head.inc.php";
include "navbar.php";

if (!isset($_SESSION["email"]))  
{
    echo "01111100 01011100 01011100 01111100 00100001 00101000 00110011 "
    . "00100000 00101011 01111100 00110010 01100000 00101111";
}
elseif ($_SESSION["email"] === "superadmin@gmail.com")
{
    echo "<img src='http://www.quickmeme.com/img/ae/aeb6b6c3b0dbff883751fa38c3f99da2288cb74aadc34ef737f12a307427aff2.jpg'
    style='width: 1000px;' alt='YoU aRE tHe AdMIn nOw hUh'>";
}
else 
{ 
    $email = $_SESSION["email"];
    $emailname = substr($email, 0, strpos($email, "@"));
    echo "<p>Welcome " . $emailname . "!</p>";
    echo "<div class='row d-flex justify-content-center align-items-center'>";
        echo "<form action='search_display.php' method='get'>";
            echo "<input type='text' placeholder='Search...' name='search'>";
                echo "<button id='search-button' type='submit' class='btn btn-success'>";
                echo "<i class='fa fa-search'></i></button></body>";
        echo "</form>";
    echo "</div>";
}




