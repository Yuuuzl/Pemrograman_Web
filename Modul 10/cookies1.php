<?php

    $data1 = 'Popoll';
    $data2 = 'Popoll Pentol';
    setcookie("username", $data1);
    setcookie("namaLengkap", $data2, time()+60); // expire 1 menit kedepan
    echo "<h1>Ini halaman untuk melakukan set cookies</h1>";
    echo "<h2>Klik <a href='cookies2.php'>di sini</a> untuk pemeriksaan cookies</h2>";

?>