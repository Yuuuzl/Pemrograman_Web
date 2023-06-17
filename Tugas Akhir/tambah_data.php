<?php include("koneksi.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location: newdashboard.php");
    exit;
}

if (isset($_POST['tambah_data'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
                    
    $cekQuery = "SELECT * FROM mahasiswa WHERE nim='$nim'";   
    $cekResult = mysqli_query($koneksi, $cekQuery);
                
    if (mysqli_num_rows($cekResult) > 0) {
        echo "<script>alert('NIM sudah terdaftar! Silakan gunakan NIM yang lain!')</script>";
    } else {

    $insertQuery = "INSERT INTO mahasiswa (nama, nim, prodi ) VALUES ('$nama', '$nim', '$prodi')";
    $insertResult= mysqli_query($koneksi, $insertQuery);
    }
    if ($insertQuery) {
        header("location: dashboard.php");
    } else {

        echo "Gagal tambah data";
    }
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css_newdashboard.css">

    <title>Data Mahasiswa</title>

    <style>
        .container {
            width: 30%;
            margin: auto;
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
    <div class="container mt-6">
        <div class="box">
            <h3>Tambah Data Mahasiswa</h3>
            <form name="dataForm" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validasiForm()">
                <div class="form-group mb-2">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" required>
                </div>
                <div class="form-group mb-2">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group mb-3">
                    <label for="prodi">Prodi</label>
                <select class="form-select" aria-label="Default select example" id="prodi" name="prodi" required>
                    <option>Teknologi Informasi</option>
                    <option>Pendidikan Teknik Informatika</option>
                    <option>Pendidikan Teknik Elektronika</option>
                    <option>Teknik Elektronika</option>
                </select>
                </div>
                <div class="flex">
                    <a href="dashboard.php" class="btn btn-danger ">
                        Batal
                    </a>
                    <button class="btn btn-primary" type="submit" name="tambah_data">
                        Tambah
                    </button>
                </div>
                <script>
                    function validasiForm() { 
                        const nama = document.querySelector('input[id="nama"]').value;  // Deklarasi variabel userid dan password
                        const nim = document.querySelector('input[id="nim"]').value;
                        const prodi = document.querySelector('input[id="prodi"]').value;

                        if (!/^[0-9]*$/g.test(nim)) {    // Cek apakah password hanya berisi angka
                            alert("NIM hanya boleh berisi angka");
                            document.forms["dataForm"]["nim"].focus(); 
                            return false;
                        } else if (!/^[a-zA-Z ]*$/g.test(nama)) {    
                            alert("Nama hanya boleh berisi huruf");
                            document.forms["dataForm"]["nama"].focus(); 
                            return false;
                        }else {
                        return confirm("Apakah anda yakin ingin mengedit data?");
                        }
                    }
                </script>
            </form>
        </div>
    </div>
  </div>

    <script>

        function confirmLogout() {
            return confirm("Apakah anda yakin ingin keluar?");
        }
            
    </script>
</body>

</html>