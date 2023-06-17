<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location: beranda.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include("koneksi.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css_newdashboard.css">
    <!-- JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <title>Login & Registration</title>
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
                <li><a href="#" class="link " onclick="haruslogin()" >Home</a></li>
                <li><a href="#" class="link " onclick="haruslogin()">Data</a></li>
                <li><a href="#" class="link"  onclick="haruslogin()">Services</a></li>
                <li><a href="#" class="link"  onclick="haruslogin()">About</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->      
    <?php 
        include("koneksi.php");                                                                                     // Memanggil file koneksi.php                                                                                       // Memulai session                                                                                              
        if (isset($_POST['login'])) {                                                                           // Membuat metode POST                                                                      
            $username = $_POST['username'];                                                                     // Deklarasi variabel username dan password
            $password = $_POST['password'];                                         
        
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $data['username'];
                header("location: beranda.php");                                                                                       // Jika sesuai, alihkan ke halaman beranda.php
            }else{
                $message = "<span style='color:red'>Username atau Password Salah! Silakan Coba Lagi!</span>";// Jika tidak sesuai, tampilkan pesan
                header("refresh:2; url= newdashboard.php");
            }
        } 
    ?>
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
        <form name=loginForm action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()"> <!-- Membuat form login -->
            <div class="input-box">
                <input type="Text" class="input-field" placeholder="Username" name="username" id="username">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password" name="password" id="password">
                <i class="bx bx-lock-alt"></i>
            </div>
              <?php if (isset($message)) : ?>                                  <!-- Menampilkan pesan -->
                <div class="message"  style="padding-bottom:10px" >
                  <?= $message ?>
                </div>
              <?php endif; ?>
            <div class="input-box">
                <input type="submit" class="submit" value="Sign In" name="login">
            </div>
        <script> 
        // Membuat fungsi validasi form
        function validateForm() { 
            const username = document.querySelector('input[name="username"]').value;  // Deklarasi variabel username dan password
            const password = document.querySelector('input[name="password"]').value;

            if (!username || !password) {                                             // Cek apakah username dan password kosong
                alert('Username dan Password harus diisi!');        
                document.forms["loginForm"]["username"].focus()     
                return false;
            }
        }
        </script>
        </form>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>


        <!------------------- registration form -------------------------->
        <?php include("koneksi.php");

            if (isset($_POST['tambah_data'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $cekQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";   
                $cekResult = mysqli_query($koneksi, $cekQuery);
                
                if (mysqli_num_rows($cekResult) > 0) {
                    echo "<script>alert('Username atau Email sudah terdaftar! Silakan gunakan Username/ Email yang lain!')</script>";
                } else {

                    $insertquery = "INSERT INTO users (username, email, password ) VALUES ('$username', '$email', '$password')";
                    $insertResult= mysqli_query($koneksi, $insertquery);

                }


                // $query = mysqli_query($koneksi, "INSERT INTO users (username, email, password ) VALUES ('$username', '$email', '$password')");

                // if ($query) {
                // header("location: newdashboard.php");
                // } else {
                // echo "Gagal tambah data";
                // }
            }
        ?>

        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
        <form name="registerForm" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validasiForm()">
            <div class="input-box">
                <input type="text" class="input-field" name="username" id="nama" placeholder="Username">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="email" class="input-field" name="email" id="mail" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" id="pw" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Register" name="tambah_data">
            </div>
        <script>
                // Membuat fungsi validasi form
    function validasiForm() { 
        const nama = document.querySelector('input[id="nama"]').value;  // Deklarasi variabel userid dan password
        const pw = document.querySelector('input[id="pw"]').value;
        const mail = document.querySelector('input[id="mail"]').value;

        if (!nama || !pw || !mail) {                                             // Cek apakah username dan password kosong
            alert('Username, Password, dan Email harus diisi!');        
            document.forms["registerForm"]["nama"].focus()     
            return false;
        }
        if (!/^[a-zA-Z0-9]*$/g.test(pw)) {    // Cek apakah password hanya berisi huruf dan angka
            alert("Password hanya boleh berisi huruf dan angka");
            document.forms["registerForm"]["pw"].focus(); 
            return false;
        }
    }
    </script>
            
        </form>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="register-check">
                    <label for="register-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </div>
    </div>
</div>   

<script>

    function haruslogin() {
        alert("Anda harus login terlebih dahulu!");
    }

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script>

</body>
</html>