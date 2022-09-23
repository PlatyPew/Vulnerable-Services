<?php

include "home.php";
include_once "config.php";

$search = "";

if (!isset($_SESSION["email"]))  
{
    echo " 00100000 00110000 01111100 01011100 01011100 01111100 00101000 00110011 "
    . "00100000 00110100 00110110 00110100 00100001 01111100 01011100 01011100 01111100";
}

else {
    $search = $_GET["search"];
    if ($search === "") {
        $search = "an empty cup..";
    }
    
    $sql = "SELECT * FROM table_of_tings WHERE name LIKE '%$search%';";
    $result = mysqli_query($conn, $sql);
    try {
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        } 
        if (str_contains($search, "'")){           
            echo "<script type='text/javascript'>alert('( ´´°︣ ͜ʖ °︣ ´´)');</script>"; 
        } else if ($result->num_rows < 1) {
            echo "<script type='text/javascript'>alert('We do not sell lousy products such as $search.');</script>";
        } else {
            echo "<script type='text/javascript'>alert('$search is in stock.');</script>";
        } 
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}