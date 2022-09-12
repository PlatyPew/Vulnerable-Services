<?php
include "head.inc.php";
include "navbar.php";

// Create database connection.
include "config.php";

$sql = "SELECT * FROM table_of_tings WHERE price= " + request.getParameter($search);
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<table>";
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name_of_ting'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['colour'] . "</td>";
    echo "</table>";
}