<?php
    include "koneksi.php";
    
    $nim = $_POST['nim'];   
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    mysqli_query($koneksi,"UPDATE mahasiswa SET nama='$nama', prodi='$prodi' WHERE nim='$nim'");
    
    header("location:dashboard.php?pesan=update");
?>
