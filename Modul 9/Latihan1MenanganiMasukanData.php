<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan masukan data metode get, post & request</title>
</head>
<body>
    <h2>Metode Get</h2>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get"> Nama
        <input type="text" name="nama"> <br>
        <input type="submit" value="OK">
    </form>

    <?php
        if (isset($_GET['nama'])) {
            echo 'Hello, ' . $_GET['nama'];
        }
    ?>

    <h2>Metode Post</h2>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> Nama
        <input type="text" name="nama"> <br>
        <input type="submit" value="OK">
    </form>

    <?php
        if (isset($_POST['nama'])) {
            echo 'Hello, ' . $_POST['nama'];
        }
    ?>

    <h2>Metode Request</h2>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get"> Nama
        <input type="text" name="nama"> <br>
        <input type="submit" value="OK">
    </form>

    <?php
        if (isset($_REQUEST['nama'])) {
            echo 'Hello, ' . $_SERVER['REQUEST_METHOD'];
        }
    ?>
    
    
</body>

</html>