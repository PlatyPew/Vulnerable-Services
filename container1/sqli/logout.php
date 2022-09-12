<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: ../ICT1004_Project/index.php");