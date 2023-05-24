<?php 
    session_start();
    if (isset($_SESSION['login'])) { 
        echo "<h1>Selamat datang ". $_SESSION['login'] ."!!</h1>";
    }
    else {
        //session tidak muncul karena belum login atau belum berhasil login
        die ("Minimal login dulu!  login dulu <a href='studikasus.php'> disini</a>");
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

     <!-- CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     
</head>
<body>
    <div class="card-body p-5 text-center">
        <h2>Ini adalah halaman HOME kamu.</h2>
        <h4> belum ada apa-apa disini, silahkan keluar :p </h4>
        <button type="button" class="btn btn-dark m-3"><a href='logout.php' style="text-decoration:none; color:white">Logout</a></button>
    </div>

</body>
</html>