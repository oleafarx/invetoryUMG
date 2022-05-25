<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="es">

<head>
    <title>Lista de Productos</title>
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

        .table-product {
            width: 90vw;
        }

        th {
            color: white;
            background-color: #0c3046;
        }

        tr {
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .timeregis {
            text-align: center;
        }

        .iconB{
            width: 20px;
        }

        .modify {
            text-align: center;

        }

        .delete {
            text-align: center;
        }

        .modify .bfix {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }

        .modify .bfix:hover {
            background-color: #fdb515;
            color: white;
        }

        .delete .bdelete {
            border-radius: 15px;
            background-color: #e60000;
            text-decoration: none;
            color: white;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }

        .delete .bdelete:hover {
            background-color: #D9ddd4;
            color: red;
        }

        .Addlist {
            margin-right: 100px;
            padding: 5px 30px 5px 30px;
            border-radius: 15px;
            text-decoration: none;
            color: white;
            background-color: #00A600;
            transition: 0.5s;
        }

        .Addlist:hover {
            color: black;
            background-color: #BBFFBB;
            text-decoration: none;
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
            <p>Lista de Productos</p>
        </div>

        <div class="table-product">
            <table class="table">
                <tr>
                    <th scope="col">Orden</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha                        </th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
                <tbody>
                    <?php
                    $idpro = 1;
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td scope="row"><?php echo $idpro ?></td>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['proname'] ?></td>
                            <td>Q.<?php echo $row['precio'] ?></td>
                            <td><?php echo $row['amount'] ?></td>
                            <td class="timeregis"><?php echo $row['time'] ?></td>
                            <td class="modify">
                                <img src="https://www.svgrepo.com/show/111261/edit.svg" alt="" class="iconB">
                                <a name="edit" id="" class="bfix" href="fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['proname'] ?>&precio=<?php echo $row['precio']; ?>&amount=<?php echo $row['amount']; ?> " role="button">
                                    Editar
                                </a></td>
                            <td class="delete">
                                <img src="https://www.svgrepo.com/show/162728/delete.svg" alt="" class="iconB">
                                <a name="id" id="" class="bdelete" href="main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                                    Eliminar
                                </a></td>
                        </tr>
                    <?php
                        $idpro++;
                    } ?>
                </tbody>
            </table>
            <br>
            <a name="" id="" class="Addlist" style="float:right" href="addlist.php" role="button">Agregar Producto</a>
        </div>
    </main>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>