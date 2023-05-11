<?php                                                                                                   
if (isset($_POST['login'])) {                                                                           // Membuat metode POST                                                                      
    $username = $_POST['username'];                                                                     // Deklarasi variabel username dan password
    $password = $_POST['password']; 
    $message = "";
    if (is_string($username) && is_string($password)) {                                                 // Cek apakah input berupa string
        if ($username == "wahyu" && $password == "wahyu") {                                             // Cek apakah username dan password sesuai
            $message = "<span style='color:white'>Selamat datang " . $username . "!</span>";            // Jika sesuai, tampilkan pesan
        } else {
            $message = "<span style='color:red'>Username atau Password Salah! Silakan Coba Lagi!</span>";// Jika tidak sesuai, tampilkan pesan
        }
    } else {
        $message = "<span style='color:red'>Data tidak valid.</span>";                                   // Jika input bukan string, tampilkan pesan
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Studi Kasus Modul 9</title>

     <!-- CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     
     <!-- JS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <style>
      body {
       background: #f5f5f5;
      }
     </style>

</head>

<body>
<section class="vh-100 gradient-custom"> 
  <div class="container py-5 h-200">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form class="mb-md-5 mt-md-4 pb-5" name="loginForm" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()"> <!-- Membuat form login -->
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4" style="text-align:left;" >
                <label class="form-label" for="username">Username</label>  
                <input type="Text" id="username" name="username" class="form-control form-control-lg" placeholder="Type your Username" />
              </div>

              <div class="form-outline form-white mb-4" style="text-align:left;">
                <label class="form-label" for="typePasswordX">Password</label>  
                <input type="password" name="password"id="password" class="form-control form-control-lg" placeholder="**********"/>
              </div>

              <?php if (isset($message)) : ?>                                  <!-- Menampilkan pesan -->
                <div class="message"  style="padding-bottom:10px" >
                  <?= $message ?>
                </div>
              <?php endif; ?>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>

            </form>

            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
              
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
            if (!/^[a-zA-Z]*$/g.test(username) || !/^[a-zA-Z]*$/g.test(pasword)) {    // Cek apakah username dan password hanya berisi huruf
                alert("Username dan Password hanya boleh berisi huruf");
                document.forms["loginForm"]["username"].focus(); 
                return false;
            }
        }
</script>

</body>

</html>