<?php

    if (isset($_COOKIE['username'])) {
        echo "<h1>Cookie 'username' ada. </h1> <br> Isinya : " .$_COOKIE['username'];
    } else {
        echo "<h1>Cookie 'username' TIDAK ada.</h1>";
    }

    if (isset($_COOKIE['namaLengkap'])) {
        echo "<h1>Cookie 'namaLengkap' ada. </h1> <br> Isinya : " . $_COOKIE['namaLengkap'];
    } else {
        echo "<h1>Cookie 'namaLengkap' TIDAK ada.</h1>";
    }
    echo "<h2> Klik <a href='cookies3.php'>di sini</a> untuk penghapusan cookies</h2>"

?>