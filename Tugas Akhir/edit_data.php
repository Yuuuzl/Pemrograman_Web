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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css_newdashboard.css">

    <title>Data Mahasiswa</title>

    <style>
        .container {
            margin: auto;
            width: 40%;
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
                <li><a href="beranda.php" class="link ">Home</a></li>
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
    <!-- Edit -->
    <div class="container mt-6">
        <div class="box">
            <h3>Edit Data Mahasiswa milik <?php echo $d['nama'] ?> </h3>
            <?php
            include "koneksi.php";
            $nim = $_GET['nim'];
            $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die();
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <form name="updateData" action="update_data.php" method="post" onsubmit="return validasiForm()">
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">    
                    <div class="form-group mb-2">    
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $d['nim'] ?> ( Nim Tidak Boleh Diganti!!!)" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $d['nama'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="prodi">Program Studi</label>
                        <select class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                            <option <?php if ($d['prodi'] == 'Teknologi Informasi') echo 'selected'; ?>>Teknologi Informasi</option>
                            <option <?php if ($d['prodi'] == 'Pendidikan Teknik Informatika') echo 'selected'; ?>>Pendidikan Teknik Informatika</option>
                            <option <?php if ($d['prodi'] == 'Pendidikan Teknik Elektronika') echo 'selected'; ?>>Pendidikan Teknik Elektronika</option>
                            <option <?php if ($d['prodi'] == 'Teknik Elektronika') echo 'selected'; ?>>Teknik Elektronika</option>
                        </select>
                    </div>
                    <div class="flex">
                        <a href="dashboard.php" class="btn btn-danger">
                            Batal
                        </a>
                        <button class="btn btn-primary" type="submit">
                            Konfirmasi
                        </button>
                    </div>
                <script>
                    function validasiForm() { 
                        const nama = document.querySelector('input[id="nama"]').value;  // Deklarasi variabel userid dan password
                        const nim = document.querySelector('input[id="nim"]').value;

                       if (!/^[a-zA-Z ]*$/g.test(nama)) {    
                            alert("Nama hanya boleh berisi huruf");
                            document.forms["updateData"]["nama"].focus(); 
                            return false;
                        }else {
                        return confirm("Apakah anda yakin ingin mengubah data?");
                        }
                    }
                </script>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
  </div>

    <script>
        // function confirmUpdate() {
        //     return confirm("Apakah anda yakin ingin mengubah data?");
        // }
        function confirmLogout() {
            return confirm("Apakah anda yakin ingin keluar?");
        }


    </script>
</body>

</html>