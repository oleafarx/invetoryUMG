<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="es">

<head>
    <title>Agregar Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #496f81;
            margin: 0;
        }

        header {
            height: 8vh;
            width: 100%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: #0c3046;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        header img {
            height: 50%;
        }

        .button-logout {
            text-decoration: none;
            border: transparent;
            border-radius: 5px;
            background-color: #e60000;
            padding: 5px 10px;
            color: white;
            transition: 0.5s;
        }

        .button-logout:hover {
            background-color: #D9ddd4;
            text-decoration: none;
            color: red;
        }

        main {
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
            height: 90vh;
        }

        .container {
            border-radius: 30px;
            text-align: center;
            width: 40%;
            padding-bottom: 10px;
            margin: 0;
        }

        .container p {
            font-size: 40px;
            font-weight: bold;
            color: white;
        }

        .fixProduct {
            width: 50vw;
            height: 50vh;
            margin: 0 auto;
            background-color: white;
            border-radius: 30px;
            border: transparent;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }


        form {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 5px;
            width: 30vw;
        }

        .buttons {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            height: 12vh;
        }

        button[type="submit"] {
            border-collapse: collapse;
            border: transparent;
            border-radius: 15px;
            color: black;
            padding: 5px 50px 5px 50px;
            background-color: #0c3046;
            transition: 0.5s;
            color: white;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            color: #ffffff;
            background-color: #496f81;
            cursor: pointer;
        }

        .return {
            text-decoration: none;
            font-size: 13px;
            border-collapse: collapse;
            border: transparent;
            border-radius: 15px;
            color: white;
            padding: 5px 50px 5px 50px;
            background-color: #0c3046;
            transition: 0.5s;
            font-size: 16px;
        }

        .return:hover {
            background-color: #496f81;
            color: white;
        }

        .addproduct {
            width: 50vw;
            height: 50vh;
            margin: 0 auto;
            background-color: white;
            border-radius: 30px;
            border: transparent;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }

        button[type="submit"] {
            border-collapse: collapse;
            border: transparent;
            border-radius: 15px;
            color: black;
            padding: 5px 50px 5px 50px;
            background-color: #00A600;
            transition: 0.5s;
            color: white;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            color: #ffffff;
            background-color: #BBFFBB;
            cursor: pointer;
        }

        .return {
            text-decoration: none;
            font-size: 13px;
            border-collapse: collapse;
            border: transparent;
            border-radius: 15px;
            color: white;
            padding: 5px 50px 5px 50px;
            background-color: #e60000;
            transition: 0.5s;
            font-size: 16px;
            margin-left: 10px;
        }

        .return:hover {
            background-color: #D9ddd4;
            color: white;
        }
    </style>
</head>

<body>
<header>
    <img src="logo.jpeg" alt="">
        <strong><p><?php echo $str = strtoupper($username) ?></p></strong>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </header>

    <main>
        <div class="container">
            <p>Agregar Productos</p>
        </div>


        <div class="addproduct">
            <form method="POST" action="main/addlist.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Producto</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Precio</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cantidad</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>
                <div class="buttons">
                    <button type="submit" class="modify" style="float:right">Agregar Producto</button>
                    <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
                </div>
            </form>
        </div>
    </main>

    <?php
    mysqli_close($conn);
    ?>
</body>

</html>