<?php 
$conn = new mysqli('localhost', 'root', '', 'db_tama');
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

session_start();

require 'assets/php/function.php';

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
}
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:index.php");
    }
    else if($data['role']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("location:index.php");
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <iconify-icon inline icon="fluent-emoji:robot" class="fs-2"></iconify-icon>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-5">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feature">Our Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.php">Registrasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="row mt-2 justify-content-center">
            <div class="p-4 col-lg col-sm-12 d-flex justify-content-center align-items-center">
                <img src="assets/img/login.png" style="margin: 0 auto;" width="85%">
            </div>
            <div class="p-4 col-lg col-sm-12 pt-3 mt-5">
                <h1 class="fw-bold mb-5 text-center text-color-primary">LOGIN</h1>
                <!-- <div class="card pt-2"> -->
                <?php if (isset($error)) : ?>
                    <p style="color: red;">User Name dan Password Tidak Terdaftar!</p>
                <?php endif; ?>
                <!-- </div> -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username">Username:</label>
                        <input placeholder="Name" type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input placeholder="Password" type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn bg-color-primary text-white w-100 mt-3">LOGIN</button>
                </form>
            </div>
        </div>
        <br><br>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</body>

</html>