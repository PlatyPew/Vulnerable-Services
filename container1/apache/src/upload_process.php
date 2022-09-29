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
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "File was uploaded.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "File not good.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
    && $fileType != "gif" && $fileType != "php") {
      echo "Not funny.";
      $uploadOk = 0;
    }
    
    // Check if $upload was successful
    if ($uploadOk == 0) {
      echo "Error.";
    // Upload file if all is right
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        
        /*$fp = fopen('briefcase.txt', "a");
        fwrite($fp, $_POST['fileToUpload']. "|||" .$target_dir."\n");
        fclose($fp); */
      } else {
        echo ":(";
      }
    }
}
    
