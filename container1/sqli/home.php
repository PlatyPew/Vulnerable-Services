<?php
include "head.inc.php";
include "navbar.php";

if (!isset($_SESSION["email"]))  
{
    echo "01111100 01011100 01011100 01111100 00100001 00101000 00110011 "
    . "00100000 00101011 01111100 00110010 01100000 00101111";
}
else 
{ 
    echo "<div class='row d-flex justify-content-center align-items-center'>";
    echo "<form action='/search_display.php' method='post'>";
    echo "<input type='text' placeholder='Search...' name='search'>";
    echo "<button id='search-button' type='submit' class='btn'>";
    echo "<i class='fa fa-search'></i></button></body>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
}
