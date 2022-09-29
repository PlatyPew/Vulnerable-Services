<?php
    ob_start();
?>
<?php
include "head.inc.php";
include "navbar.php";

if ($_SESSION["email"] !== "king@gmail.com")  
{
    echo "01111100 01011100 01011100 01111100 00100001 00101000 00110011 "
    . "00100000 00101011 01111100 00110010 01100000 00101111";
} else {

    echo "<form action='upload_process.php' method='post' enctype='multipart/form-data'>";
    echo "<div class='form-group'><label class='form-label'>Select image to upload</label>
    <input type='file' class='form-control' name='fileToUpload' id='fileToUpload'/></div>";
    echo "<br>";
    echo "<div class='form-group'><button class='btn btn-secondary col-3' id='upload' name='upload'
                        type='submit'>Upload</button></div>";
    echo "</form>";
}
