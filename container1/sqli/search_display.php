<?php

include "home.php";

// Create database connection.
include "config.php";

if (!isset($_SESSION["email"]))  
{
    echo "01111100 01011100 01011100 01111100 00100001 00101000 00110011 "
    . "00100000 00101011 01111100 00110010 01100000 00101111";
}

$search = $_GET["search"];
if ($search === "") {
    $search = "2204";
}
$search = str_ireplace('delay', '', $search);
$search = str_ireplace('sleep', '', $search);
$search = str_ireplace('benchmark', '', $search);

$sql = "SELECT * FROM table_of_tings WHERE name LIKE '%$search%';";
$result = mysqli_query($conn, $sql);
echo "<table class='table align-middle'>";
    echo "<thead class='bg-light'>";
        echo "<tr>";
          echo "<th>the ting</th>";
          echo "<th>Name</th>";
          echo "<th>Price</th>";
          echo "<th>Colour</th>";
        echo "</tr>";
    echo "</thead>";
try {
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    } 
    if (!$result) {
        $error = mysqli_error($conn);
    } else {
        while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>";
                        echo "<div class='d-flex align-items-right'>";
                        $img_base64 = $row["img_base64"];
                        $img = "data:image/" . "png" . ";base64," . $img_base64;
                        echo "<img src='$img' alt='img' height='100px' width='100px'/>";
                        echo "</div>";
                    echo "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["colour"] . "</td>";
                echo "</tr>";
        }
    } echo "</table>";
} catch (Exception $e) {
    echo $e->getMessage();
}


