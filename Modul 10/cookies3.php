<?php

    //set expiration date 1 menit yang lalu
    
    setcookie("username", "", time()-60);
    setcookie("namaLengkap", "", time()-60);
    echo "<h1>Cookies berhasil dihapus</h1>";
    echo "<h2>Klik <a href='cookies2.php'>di sini</a> untuk pemeriksaan cookies</h2>";
    
?>