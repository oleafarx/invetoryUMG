<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "inventoryDB";
    $conn = new mysqli($host , $user, $pass, $dbname);
    mysqli_query($conn , "SELECT * FROM user");
    if($conn->connect_error){
        die("Database Error : " . $conn->connect_error);
    }
?>