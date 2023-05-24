<?php 
    session_start();
    if (isset($_SESSION['login'])) {
        unset ($_SESSION);
        session_destroy();
        echo "<h3>Kamu berhasil logout.</h3>";

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
        <h4>Kamu tidak bisa masuk ke beranda sebelum login</h2>
        <button type="button" class="btn btn-dark" ><a href='Studikasus.php' style="text-decoration:none; color:white">Login</a></button>
        <h4> kalo ga percaya coba aja </h4>
        <button type="button" class="btn btn-dark"><a href='Landingpage.php' style="text-decoration:none; color:white">Beranda</a></button>
    </div>

</body>
</html>