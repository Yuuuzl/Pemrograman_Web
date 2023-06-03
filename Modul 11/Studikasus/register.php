<!DOCTYPE html>
<html lang="en">
<?php
    include("koneksi.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
</head>

<body>
    <h3>//---------------------------//</h3>
    <h3> Registrasi</h3>
    <h3>//---------------------------//</h3>

    <h5> Tambah Data Mahasiswa </h5>

    <?php include("koneksi.php");

if (isset($_POST['tambah_data'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");

    if ($query) {
        header("location: login.php");
    } else {
        echo "Gagal tambah data";
    }
}
?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td> Username </td>
                <td> <input type="text" name="username" required> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required ></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Confirm" name="tambah_data"></td>
            </tr>
        </table>
    </form> 

    <br>
    <h3>//---------------------------//</h3>
</body>
</html>