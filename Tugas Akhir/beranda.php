<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: newdashboard.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: newdashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css_newdashboard.css">

</head>
<body>
    <div class="wrapper" >  
    <!-- Nav Bar -->
    <nav class="nav">
        <div class="nav-logo">
            <p>Yuuuzl</p>
        </div>
        </button>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="beranda.php" class="link active">Home</a></li>
                <li><a href="dashboard.php" class="link">Data</a></li>
                <li><a href="#" class="link">Services</a></li>
                <li><a href="#" class="link">About</a></li>
            </ul>
        </div>
        <form action="" method="post" onsubmit="return confirmLogout()">
            <div class="nav-button">
                <button class="btn white-btn" type="submit" name="logout" ">Logout</button>
            </div>
        </form>
    </nav>
      
    <!-- Isi Dashboard -->
    <section class="bg-dark text-light p-5 text center text-sm-start" id="home">
        <div class="d-sm-flex align-item-center justify-content-betweer py-5">
            <div>
                <h1>Data Mahasiswa</h1>
                <h3 class=my-4">UNY</h3>
                <p class="lead">
                    Mahasiswa Departemen Pendidikan Teknik Elektronika dan Informatika Tahun Ajaran 2023/2024
                </p>
                <a href="dashboard.php" class="btn btn-secondary btn-sm">Go to Data</a>
            </div>
        </div>
        
    </section>

  </body>
    <script>

        function confirmLogout() {
            return confirm("Apakah anda yakin ingin keluar?");
        }
            
    </script>
</html>
</body>
</html>