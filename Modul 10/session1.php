<?php
session_start();
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    //memeriksa login
    if ($user == "Langit Senja Nirwana" && $pass == "2035") {
        //menciptakan session
        $_SESSION['login'] = $user;
        //menuju ke halaman pemeriksaan session
        echo "<h1>Anda berhasil login</h1>";
        echo "<h2>Klik <a href='session2.php'> disini (session2.php)</a> untuk menuju halaman pemeriksaan session</h2>";
    } else {
        echo "<h1>Hayoo anda gagal login</h1>";
        echo "<h2>Klik <a href='session1.php'>disini</a> untuk login lagi. <h2>";
    }
} else {
?>
    <html>

    <head>
        <title>Login Disini</title>
    </head>

    <body>
        <form action="" method="post">
        <h2>Login Disini</h2>
        Username : <input type="text" name="user"><br>
        Password : <input type="password" name="pass"><br>
        <input type="submit" name="login" value="login">
        </form>
    </body>

    </html>
<?php
}
?>
