<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();

    }

    if($_POST['name'] != null && $_POST['amount'] != null && $_POST['price'] != null ){
        $sql = "INSERT INTO product (proname,precio,amount,time) VALUES ('". trim($_POST['name']). "','". trim($_POST['price']). "','". trim($_POST['amount']). "', now() )";
        if($conn->query($sql)){
            echo "<script>alert('Producto añadido a la lista')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
        else{
            echo "<script>alert('Fallo en agregar producto')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conn);
?>