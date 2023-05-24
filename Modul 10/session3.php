<?php 
    session_start();
    if (isset($_SESSION['login'])) {
        unset ($_SESSION);
        session_destroy();
        echo "<h1>Kamu berhasil keluar.</h1>";
        echo "<h2>Klik <a href='session1.php'>disini</a> untuk login lagi. <br>Kamu tidak bisa masuk ke <a href='session2.php'>HOME(Beranda)</a> lagi</h2>";
    }
    else {
        //session tidak muncul karena belum login atau belum berhasil login
        die ("Anda belum login! Login  dulu <a href='session1.php'> disini</a>");
    }

?>