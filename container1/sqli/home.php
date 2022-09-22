<?php
include "head.inc.php";
include "navbar.php";
include "config.php";

$search = "";

if (!isset($_SESSION["email"]))  
{
    echo "01111100 01011100 01011100 01111100 00100001 00101000 00110011 "
    . "00100000 00101011 01111100 00110010 01100000 00101111";
}
elseif ($_SESSION["email"] === "superadmin@gmail.com")
{
    echo "<img src='https://c.tenor.com/kGekz062mwgAAAAC/hugs-rickroll.gif'
        style='width: 300px;' alt='rick roll'>";
    echo "<img src='http://www.quickmeme.com/img/ae/aeb6b6c3b0dbff883751fa38c3f99da2288cb74aadc34ef737f12a307427aff2.jpg'
        style='width: 600px;' alt='YoU aRE tHe AdMIn nOw hUh'>";
}
else 
{ 
    $email = $_SESSION["email"];
    $emailname = substr($email, 0, strpos($email, "@"));
    $cookie_id = random_bytes("10");
    setcookie('cookie_id', $cookie_id, time() + 600, "/2204/"); // cookie expire in 10mins
    $date=date("Y-m-d H:i:s");
    echo "<div class='jumbotron'>";
        echo "<div class='container text-center'>";
            echo "<h1>Online Store 29</h1>";
            echo "<p>Welcome " . $emailname . "!</p>";
        echo "</div>";
    echo "</div>";    
    echo "<div class='row d-flex justify-content-center align-items-center'>";
        echo "<form action='search_display.php' method='get'>";
            echo "<input type='text' placeholder='Search product...' name='search'>";
                echo "<button id='search-button' type='submit' class='btn btn-success'>";
                echo "<i class='fa fa-search'></i></button></body>";
        echo "</form>";
    echo "</div>";
    
    
    try {
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        // insert cookie into db
        } else {
            $stmt = $conn->prepare("INSERT INTO cookies (cookieID, date) VALUES (?, ?)");
            $stmt->bind_param("ss", $cookie_id, $date);
            if (!$stmt->execute()) {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                $success = false;
            }
            $stmt->close();
        } if ($search === "") {
                $sql = "SELECT * FROM table_of_tings;";
                $result = mysqli_query($conn, $sql);
                echo "<div class='container'>";
                $rowCount = 0;
                while ($row = $result->fetch_assoc()) {                
                    $img_base64 = $row["img_base64"];
                    $img = "data:image/" . "png" . ";base64," . $img_base64;
                    //3 cards per row
                    if($rowCount % 3 == 0) { 
                        echo "<div class='row'>";                    
                    } 
                    $rowCount++;
                    echo "<div class='card col-md-4'>";
                        echo "<img class='card-img-top' src='$img' alt='img' height='250px' width='250px'>";
                        echo "<div class='card-body'>";
                            echo "<p class='card-text'>" . $row["name"] . "<br>" . $row["price"] . "</p>";
                        echo "</div>";
                    if($rowCount % 3 == 0) { 
                        echo "</div>";                
                    } 
                    echo "</div>";
                echo "<br><br>";
                } 
            }   
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}




