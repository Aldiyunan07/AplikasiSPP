<?php
session_start();
if (isset($_SESSION['login']) ) {
	header('Location: index.php');
} 
include 'koneksi.php';
if($_SERVER['REQUEST_METHOD']=='POST' ) {
	$user  = $_POST['username'];
	$pass  = MD5($_POST['password']);

	if ( $user == "" || $pass == ""){
		$error = true;
	}else{
	$data = mysqli_query($konek,"SELECT * FROM admin WHERE username ='".$user."' AND password = '".$pass."'");
	$dt = mysqli_num_rows($data);
	$dta = mysqli_fetch_Assoc($data);
  $data2 = mysqli_query($konek,"SELECT * FROM tb_tu WHERE username = '$user' AND password = '$pass'");
  $dt2 = mysqli_num_rows($data2);
  $dta2 = mysqli_fetch_assoc($data2);
  
	if($dt > 0) {
		session_start();
		$_SESSION['login']    = "Admin";
		$_SESSION['username'] = $dta['username'];
		$_SESSION['id']		    = $dta['idadmin'];
    while($d = mysqli_fetch_array($data)){
      $_SESSION['nama'] = $d['namalengkap'];
    }
    $_SESSION['nama']     = $dta['namalengkap'];
		header('Location: index.php');
	}elseif($dt2 > 0){
    session_start();
		$_SESSION['login']    = "Staff TU";
		$_SESSION['username'] = $dta2['username'];
		$_SESSION['id']		    = $dta2['idadmin'];
    while($d2 = mysqli_fetch_array($data2)){
      $_SESSION['nama'] = $d2['nama'];
      $_SESSION['id']   = $d2['id'];
    }
    $_SESSION['id']       = $dta2['id'];
    $_SESSION['nama']     = $dta2['nama'];
		header('Location: index.php');
  }else{
    header('location:login.php?pesan=gagal');
  } // } else untuk data username 

} //  } else untuk if else $user = "" 

	
} // } else untuk if isset 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login | S - Pay</title>

  <!-- General CSS Files -->
  <link rel="icon" href="assets/home/img/lo-removebg-preview.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
		<?php if (isset($error) ) :  ?>
				<div class="alert alert-warning">
		<span><b>Peringatan!!</b>Form Belum Lengkap</span>
		</div>
	<?php endif;  ?>

          <div class="p-4 m-3">
            <div class="row">              
              <img src="assets/home/img/panjang.png" alt="logo" width="80%" class=" mb-3 mt-2">
            </div>
            <h4 class="text-dark font-weight-normal">Selamat Datang</h4>
            <p class="text-muted">Login terlebih dahulu sebelum anda mengelola aplikasi pembayaran SPP </p>
            <form method="post" action="">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" autocomplete='off' autofocus name="username" placeholder="Masukan Username">
                <div class="invalid-feedback">
                  Please fill in your username
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label>Password</label>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

            </form>

            <div style="margin-top:200px;" class="text-center mt-5  text-small">
              Aplikasi S - Pay &copy; V.1.1
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../images/1 - Copy.jpg" style="background-image: url('../assets/img/background-login.jpg');">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold"><?php

                                                            date_default_timezone_set("Asia/Jakarta");

                                                            $b = time();
                                                            $hour = date("G", $b);

                                                            if ($hour >= 0 && $hour <= 11) {
                                                              echo "Selamat Pagi";
                                                            } elseif ($hour >= 12 && $hour <= 14) {
                                                              echo "Selamat Siang ";
                                                            } elseif ($hour >= 15 && $hour <= 17) {
                                                              echo "Selamat Sore ";
                                                            } elseif ($hour >= 17 && $hour <= 18) {
                                                              echo "Selamat Petang  ";
                                                            } elseif ($hour >= 19 && $hour <= 23) {
                                                              echo "Selamat Malam ";
                                                            }

                                                            ?></h1>
                <h5 class="font-weight-normal text-muted-transparent">SMK AL-MADANI GARUT</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="#">Aldi Yunan Anwari</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

 <!-- Template JS File -->
  <script src="../assets/scripts.js"></script>
  <script src="../assets/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
