<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan bab 8 PHP</title>
</head>
<body>
    <h2> 1. Program PHP </h2>
    <!-- Membuat program php dan memisahkan kode php dan dokumen html -->
    <?php
        echo 'Kode PHP di sini';
        // ...
    ?>
        <p> Dokumen HTML </p>
    <?php
        echo 'Kode PHP di sini';
        // ...
    ?>

    <!-- Shortcut kode PHP dalam html -->
    <p> Kode<?php echo "PHP"; ?> di HTML</p>


    <h2> 2. Variabel </h2>
    <!-- Membuat variabel -->
    <!-- Variabel diidentifikasikan melalui karakter dollar dan diikuti nama variabel -->
    <?php
        // Deklarasi dan inisialisasi variabel
        $nama = 'Rizki';
        $umur = 20;
        $tinggi = 1.7;
        $menikah = false;
        echo $nama;
        echo '<br/>';
        echo $umur;
        echo '<br/>';
        echo $tinggi;
        echo '<br/>';
        echo $menikah;
        echo '<br/>';
    ?>

    <!-- memanfaatkan fungsi var_dump() atau print_r() untuk memudahkan pemeriksaaan variabel -->
    <?php
        // Deklarasi dan inisialisasi variabel
        $nama = 'Rizki';
        $umur = 20;
        $tinggi = 1.7;
        $menikah = false;
        echo $nama;
        echo '<br/>';
        echo $umur;
        echo '<br/>';
        echo $tinggi;
        echo '<br/>';
        echo $menikah;
        echo '<br/>';
        // dumping informasi variabel
        var_dump($nama);
        echo '<br/>';
        var_dump($umur);
        echo '<br/>';
        var_dump($tinggi);
        echo '<br/>';
        var_dump($menikah);
        echo '<br/>';

        print_r($nama);
        echo '<br/>';
        print_r($umur);
        echo '<br/>';
        print_r($tinggi);
        echo '<br/>';
        print_r($menikah);
        echo '<br/>';
    ?>

    <!-- Menggunakan kontruksi bahasa isset() -->
    <?php
        // Deklarasi dan inisialisasi variabel
        $nama = 'Rizki';
        var_dump($nama);
        // hasil : string(5) "Rizki"
        
        $umur = 20;
        var_dump($umur);
        // hasil : int(20)

        $tinggi = 1.7;
        var_dump($tinggi);
        // hasil : float(1.7)

        $menikah = false;
        var_dump($menikah);
        // hasil : bool(false)
    ?>

    <h2> 3. Tipe Data dan Casting </h2>
    <!-- Tipe data -->
    <!-- PHP menyediakan fungsi-fungsi berawalan is_ yang dapat dimanfaatkan untuk menuji tipe data suatu variabel -->
    <?php
        $nama = 'Rizki';
        var_dump(is_string($nama));
        // hasil : bool(true)

        $umur = 20;
        var_dump(is_int($umur));
        // hasil : bool(true)

        $tinggi = 1.7;
        var_dump(is_float($tinggi));
        // hasil : bool(true)
        
        $tinggi = 1.7;
        var_dump(is_double($tinggi));
        // hasil : bool(true)

        $tinggi = 1.7;
        var_dump(is_string($tinggi));
        // hasil : bool(false)
    ?>

    <!-- Casting -->
    <!-- PHP menyediakan fungsi-fungsi berawalan (tipe data) yang dapat digunakan untuk mengubah tipe data suatu variabel -->

    <?php
    $str = '123abc'; 
 
    // Casting nilai vaiabel $str ke integer
    $bil = (int) $str; // $bil = 123 
     
    echo gettype($str);
    // Output: string 
     
    echo gettype($bil);
    // Output: integer     
    ?>

    <h2></h2>
</body>
</html>