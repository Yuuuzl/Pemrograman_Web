<?php
include("koneksi.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location: newdashboard.php");
    exit;
}


$nim = $_GET['nim'];
$data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die('koneksi gagal');
$no = 1;
$d = mysqli_fetch_array($data);

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

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css_newdashboard.css">

    <title>Menampilkan Data Tabel</title>

    <style>
        .container {
            width: 60%;
        }

        .box {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 20px;
        }
    </style>
</head>

<body>
  <div class="wrapper"> 

    <!-- Nav Bar -->
    <nav class="nav">
        <div class="nav-logo">
            <p>Yuuuzl</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="beranda.php" class="link">Home</a></li>
                <li><a href="dashboard.php" class="link active">Data</a></li>
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

    <!-- container -->
    <div class="container">
        <div class="box">
            <div class="judul">
                <h3> Data Mahasiswa <?php echo $d['nama'] ?> </h3>
            </div>
            <br>
            <div class="box">
                <?php
                include("koneksi.php");
                $nim = $_GET['nim'];
                $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die('koneksi gagal');
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <table>
                        <tr>
                            <td>NIM</td>
                            <td>: <?php echo $d['nim'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: <?php echo $d['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>: <?php echo $d['prodi'] ?></td>
                        </tr>
                        <tr></tr>
                    </table>
                <?php
                } ?>
            </div>
            <a href="dashboard.php" class="btn btn-danger mt-3">Kembali</a>
        </div>
    </div>
  </div>
</body>
    <script>
        function confirmLogout() {
            return confirm("Apakah anda yakin ingin keluar?");
        }

    </script>

</html>