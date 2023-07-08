<?php
    $hostname = "localhost";
    $username = "root";
    $password = ""; 
    $database = "penku";

    $konn = mysqli_connect($hostname, $username, $password, $database) or die("Database connect gagal");
?>