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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- CSS Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css_dashboard.css">
    <title>Data Mahasiswa</title>

    <style>
        .box {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 20px;
            margin-top : 170px;
            margin-bottom : 100px;
        }
        .boxdalam {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 20px;
            margin-top : 20px;
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
    <div class="container mt-5" style="width: 100%;">
        <div class="box">
            <h2 class="text-center mb-5">Data Mahasiswa</h2>
            <div class="boxdalam">
                <a href="tambah_data.php" class="btn btn-primary mb-3">Tambah Data</a>
                </form>
                <table class="table table-striped mt-3 mb-3" id="data" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * from mahasiswa");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nim']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['prodi']; ?></td>
                                <td>
                                    <a class="btn" href="lihat_data.php?nim=<?php echo $d['nim']; ?>">Lihat</a>
                                    |
                                    <a class="btn" href="edit_data.php?nim=<?php echo $d['nim']; ?>">Edit</a>
                                    |
                                    <a class="btn" href="hapus_data.php?nim=<?php echo $d['nim']; ?>" onclick="return confirmDelete()">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <div class="ms-3 mt-3 ">
                    <a href="#" class="btn btn-primary">Cetak Data</a>
                </div>             
            </div>
        </div>
    </div>
  </div>

    <!-- Javascript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#data').DataTable();
        });

        function confirmLogout() {
            return confirm("Apakah anda yakin ingin keluar?");
        }

        function confirmDelete() {
            return confirm("Apakah anda yakin ingin menghapus data?");
        }
    </script>
</body>

</html>