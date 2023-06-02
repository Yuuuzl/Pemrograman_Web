 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Latihan </title>
 </head>
 <body>
    <h3>//---------------------------//</h3>
    <h3> Data Mahasiswa Kelas I</h3>
    <h3>//---------------------------//</h3>

    <h5> Tambah Data Mahasiswa </h5>

    <?php include("koneksi.php");

if (isset($_POST['tambah_data'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO datamahasiswa (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");

    if ($query) {
        header("location: full.php");
    } else {
        echo "Gagal tambah data";
    }
}
?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td> Nim </td>
                <td> <input type="number" name="nim" required> </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required ></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah" name="tambah_data"></td>
            </tr>
        </table>
    </form> 

    <br>
    <h3>//---------------------------//</h3>

    <h5> Data Mahasiswa </h5>
    <table border="1" cellpadding="15" cellspacing="0" table style="margin-left:auto bgcolor="FFF2F2">
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Menu</th>
        </tr>
        <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"SELECT * from datamahasiswa");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nim']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td>
                    <a href="lihat_data_full.php?nim=<?php echo $d['nim']; ?>"> Lihat </a>
                    <a href="edit_data_full.php?nim=<?php echo $d['nim']; ?>">Edit</a>
                    <a href="hapus_data_full.php?nim=<?php echo $d['nim']; ?>">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
    </table>

 </body>
 </html>