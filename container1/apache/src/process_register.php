<?php
    ob_start();
?>
<?php

$email = $pwd_hashed = $errorMsg = "";
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST")   //if form submitted via post
{
    //email
    if (empty($_POST["email"])) 
    {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } 
    else 
    {
        $email = sanitize_input($_POST["email"]);
    // Additional check to make sure e-mail address is well-formed.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }
    //password
    if (empty($_POST["password"]) || empty($_POST["password_confirm"]))
    {
        $errorMsg .= "Password is required.<br>";
        $success = false;
    }
    else
    {
        //make sure pw matched
        if ($_POST["password"] != $_POST["password_confirm"])
        {
            $errorMsg .= "Passwords do not match.<br>";
            $success = false;
        }
        else
        {
            //hash pw
            $pwd_hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);
        } 
    }
}
else 
{
    echo "<h2>Please do not run this page directly.</h2>";
    echo "<p>Register with the link below:</p>";
    echo "<a href='register.php'>Sign Up Page</a>";
    exit();
}
        
//Sanitisation function to strip unwanted content
function sanitize_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
 * Helper function to write the member data to the DB
 */
function saveMemberToDB() 
{
    global $email, $pwd_hashed, $errorMsg, $success;
    // Create database connection.
    include "config.php";
    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO member (email, password) VALUES (?, ?)");
        // Bind & execute the query statement:
        $stmt->bind_param("ss", $email, $pwd_hashed);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<html>
    <head>
        <title>Registration</title>
        <?php
        include "head.inc.php";
        ?>
    </head>
    <body class="bg-dark">
        <?php
        include "navbar.php";
        ?>
        <header class="jumbotron text-center">
            <h1 class="display-4">Registration Status</h1>
        </header>
        
        <main class="container p-3 bg-dark text-white">
            <hr>
            <?php
            if ($success)
            {
                echo "<h2>Registration completed!</h2>";
                echo "<h3>Welcome aboard, " . $email . ".</h3>";
                echo "<a href='index.php' class='btn btn-success'>Login</a>";
                saveMemberToDB();
            }
            else
            {
                echo "<h1>:(</h1>";
                echo "<h2>Sorry</h2>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a href='register.php' class='btn btn-danger'>Register</a>";
            }
            ?>
        </main>
        <?php
            include "footer.php";
        ?>
    </body>
</html>
