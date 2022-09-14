<?php
include "head.inc.php";
include "navbar.php";

if ($_SESSION["email"] !== "king@gmail.com")  {
    echo "01111100 01011100 01011100 01111100 00100001 00101000 00110011 "
    . "00100000 00101011 01111100 00110010 01100000 00101111";
} else {
    
    $files = scandir( "C:/xampp/htdocs/2204/uploads" );
    foreach( $files as $file ){
       echo $file . "<br />";
    }
}
