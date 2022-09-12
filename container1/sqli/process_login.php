<?php

$email = $pwd_hashed = $errorMsg = "";
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST")   
{
    $email = sanitize_input($_POST["email"]); 
    authenticateUser();
}
else 
{
    echo "<h2>Please do not run this page directly.</h2>";
    echo "<p>Login with the link below:</p>";
    echo "<a href='index.php'>Log in Page</a>";
    exit();
}

//Checks input for unwanted content.
function sanitize_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
 * Authenticate the log in.
 */

function authenticateUser() {
    global $email, $pwd_hashed, $errorMsg, $success;
    // Create database connection.
    include "config.php";
    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
    // Prepare the statement:
        $stmt = $conn->prepare("SELECT * FROM member WHERE email=?");
    // Bind & execute the query statement:
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
    // Email field is unique, so only one row
            $row = $result->fetch_assoc();
            $email = $row["email"];
            $pwd_hashed = $row["password"];
    // Check if the password matches:
            if (!password_verify($_POST["password"], $pwd_hashed)) {
                $errorMsg = "press fqw to pay respects...(T⌓T)";
                $success = false;
                var_dump($_POST["password"]);
                echo"<br>";
                var_dump(password_verify($_POST["password"], $pwd_hashed));
                echo"<br>";
                var_dump($pwd_hashed);
            } 
        } else {
            $errorMsg = "press f to pay respects...(T⌓T)";
            $success = false;
            var_dump($success);
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<html>
    <head>
        <title>Login Status</title>
        <?php
        include "head.inc.php";
        ?>
    </head>
    <body class="bg-dark">
        <?php
        include "navbar.php";
        ?>
        <header class="jumbotron text-center">
            <h1 class="display-4">Log in Status</h1>
        </header>
        
        <main class="container p-3 bg-dark text-white">
            <hr>
            <?php
            if ($success == true)
            {
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["pwd"] = $pwd_hashed;
                header("location: ../2204/home.php");
                exit(); 
            }
            else
            {
                echo "<h1>:(</h1>";
                echo "<h2>Sorry</h2>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a href='index.php' class='btn btn-danger'>Return to Log in</a>";
            }
            ?>
        </main>
        <br>
        <?php
            include "footer.php";
        ?>
    </body>
</html>

