<?php
$servername = "mysql:host=sql2.njit.edu";
$username = "np549";
$password = "H2TvdF4w7zTPxJZ3";

try {
    $conn = new PDO($servername,$username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully "; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>