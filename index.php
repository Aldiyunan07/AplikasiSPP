<?php 
include 'admin/koneksi.php';
if(isset($_POST['kirim'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pesan = $_POST['pesan'];
  $date = date('Y-m-d');
  $sql = mysqli_query($konek,"INSERT INTO tb_kontak VALUES(null,'$nama','$email','$pesan','$date')");
  if($sql){
    echo "<script> alert('Pesan anda telah terkirim'); </script>";
  }else{
    echo "<script> alert('Pesan anda gagal di kirim!'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="description" content="Mobile Application HTML5 Template">

  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

  <title> School Payment</title>

  <link rel="icon" href="admin/assets/home/img/lo-removebg-preview.png" type="image/x-icon">

  <link rel="stylesheet" href="admin/assets/home/maicons.css">

  <link rel="stylesheet" href="admin/assets/home/animate.css">


  <link rel="stylesheet" href="admin/assets/home/bootstrap.css">

  <link rel="stylesheet" href="admin/assets/home/mobster.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
    <div class="container">
      <a class="navbar-brand" href="#" style="margin-left:-40px;">
        <img src="admin/assets/home/img/panjang.png" alt="" width="250" height="80">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
        aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mt-3 mt-lg-0" style="margin-left:-20px;">
          <li class="nav-item active">
            <a class="nav-link" href="about.html">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#fitur">Fitur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kelebihan">Keunggulan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kontak">Kontak</a>
          </li>
        </ul>
        <div class="ml-auto my-2 my-lg-0">
          <a href="admin/login.php" class="rounded-pill btn btn-outline-light">Login Sebagai Admin / Staff Tu</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="page-hero-section bg-image hero-home-1" style="background-image: url(admin/assets/images/bg_hero_1.svg);">
    <div class="hero-caption pt-5">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-6 wow fadeInUp">
            <h1 class="mb-4">AYO SEGERA BAYAR SPP MU DISINI</h1>
            <p class="mb-4">S - PAY memiliki fitur untuk melihat dan mengatur data pembayaran siswa, seperti transaksi,
              dan statistik.</p>
            <a href="user/login.php" class="btn btn-outline-primary rounded-pill">Login sebagai siswa</a>
          </div>
          <div class="col-lg-6 d-none d-lg-block wow zoomIn">
            <div class="img-place" style="margin-top:-20px;">
              <img src="admin/assets/home/img/icon3.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="position-realive bg-image" style="background-image: url(admin/assets/home/img/pattern_1.svg);">

    <div class="page-section" id="kelebihan">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 py-3">
            <div class="img-place wow zoomIn">
              <img src="admin/assets/home/img/icon2.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 mt-lg-5">
            <div class="iconic-list">
              <div class="iconic-item wow fadeInUp">
                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                  <span class="mai-shield"></span>
                </div>
                <div class="iconic-content">
                  <h5>Keamanan Data Transaksi</h5>
                  <p class="fs-small"> Dengan aplikasi S-pay terjamin keamanan data transaksi spp siswa lebih aman dan
                    terpercaya</p>
                </div>
              </div>
              <div class="iconic-item wow fadeInUp">
                <div class="iconic-md iconic-text bg-info fg-white rounded-circle">
                  <span class="mai-desktop-outline"></span>
                </div>
                <div class="iconic-content">
                  <h5>Teknologi Canggih</h5>
                  <p class="fs-small">Proses transaksi pembayaran spp dengan menggunakan aplikasi menjadikan sekolah
                    lebih maju dengan era teknologi</p>
                </div>
              </div>
              <div class="iconic-item wow fadeInUp">
                <div class="iconic-md iconic-text bg-indigo fg-white rounded-circle">
                  <span class="mai-cube"></span>
                </div>
                <div class="iconic-content">
                  <h5>Fitur </h5>
                  <p class="fs-small"> Tidak hanya fitur transaksi pembayaran spp saja di dalam aplikasi S-pay namun ada
                    juga fitur yang unik di aplikasi S-pay</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>


  <div class="page-section bg-dark fg-white" id="fitur">
    <div class="container">
      <h1 class="text-center"> Fitur Aplikasi S - Pay</h1>

      <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-3 py-3">
          <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="100ms">
            <div class="mb-3">
              <img src="admin/assets/home/img/icon/laptop.svg" alt="">
            </div>
            <p class="fs-large">Tampilan Progress SPP</p>
            <p class="fs-small fg-grey">SPP siswa bisa di tunjukan dalam bentuk progres supaya lebih mudah di pahami</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 py-3">
          <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="200ms">
            <div class="mb-3">
              <img src="admin/assets/home/img/icon/testimony.svg" alt="">
            </div>
            <p class="fs-large">Cetak Struk Pembayaran</p>
            <p class="fs-small fg-grey"> Siswa bisa mendapatkan struk pembayaran dalam bentuk kertas juga bisa dalam
              bentuk media </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 py-3">
          <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="400ms">
            <div class="mb-3">
              <img src="admin/assets/home/img/icon/support.svg" alt="">
            </div>
            <p class="fs-large">Galat Transaksi</p>
            <p class="fs-small fg-grey">Fitur ini di sediakan apabila terjadi kesalahan Staff TU dalam transaksi
              pembayaran SPP</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3  mt-1 py-3">
          <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="600ms">
            <div class="mb-3">
              <img src="admin/assets/home/img/icon/coins.svg" alt="">
            </div>
            <p class="fs-large">Tabungan Siswa</p>
            <p class="fs-small fg-grey">Siswa bisa menabung uang, menarik uang dan membayar tabungan ke dalam spp</p>
          </div>
        </div>

      </div>
    </div>
  </div>



  <div class="page-section" id="kontak">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 py-3 mb-5 mb-lg-0">
          <div class="img-place w-lg-75 wow zoomIn">
            <img src="admin/assets/home/img/icon/illustration_contact.svg" alt="">
          </div>
        </div>
        <div class="col-lg-5 py-3">
          <h1 class="wow fadeInUp">Hubungi kami <br></h1>

          <form method="POST" class="mt-5">
            <div class="form-group wow fadeInUp">
              <label for="name" class="fw-medium fg-grey">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="nama" autocomplete="off">
            </div>

            <div class="form-group wow fadeInUp">
              <label for="email" class="fw-medium fg-grey">Email</label>
              <input type="text" class="form-control" id="email" name="email" autocomplete="off">
            </div>

            <div class="form-group wow fadeInUp">
              <label for="message" class="fw-medium fg-grey">Pesan</label>
              <textarea rows="6" class="form-control" name="pesan" id="message"></textarea>
            </div>

            <div class="form-group mt-4 wow fadeInUp">
              <button type="submit" class="btn btn-primary" name="kirim">Kirim Pesan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="page-footer-section bg-dark fg-white">
    <div class="container">
      <div class="row mb-5 py-3">
        <div class="col-sm-6 col-lg-2 py-3">
          <h5 class="mb-3"> Fitur </h5>
          <ul class="menu-link">
            <li><a href="#" class="">Progress Siswa</a></li>
            <li><a href="#" class="">Galat Transaksi</a></li>
            <li><a href="#" class="">Tabungan Siswa</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-2 py-3">
          <h5 class="mb-3">Hak Akses</h5>
          <ul class="menu-link">
            <li><a href="#" class="">Siswa</a></li>
            <li><a href="#" class="">Staff TU</a></li>
            <li><a href="#" class="">Admin</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-4 py-3">
          <h5 class="mb-3">Kontak</h5>
          <ul class="menu-link">
            <li><a href="#" class="">S-PayOfficial@gmail.com</a></li>
            <li><a href="#" class="">+621-881-997-131</a></li>
            <li><a href="#" class="">@S-pay</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-4 py-3">
          <h5 class="mb-3">Follow Us</h5>
          <p> Ikuti Kami di media sosial untuk mendapatkan info aplikasi menarik dari kami </p>


          <!-- Social Media Button -->
          <div class="mt-4">
            <a href="#" class="btn btn-fab btn-danger fg-white justify-content-center"><span
                class="mai-logo-instagram"></span></a>
            <a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-facebook"></span></a>
            <a href="#" class="btn btn-fab btn-info fg-white"><span class="mai-logo-twitter"></span></a>
            <a href="#" class="btn btn-fab btn-light fg-dark"><span class="mai-logo-github"></span></a>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 py-2">
          <img src="admin/assets/home/img/lo-removebg-preview.png" alt="" width="40">
          <!-- Please don't remove or modify the credits below -->
          <p class="d-inline-block ml-2">Copyright &copy; School Payment </p>
        </div>
        <div class="col-12 col-md-6 py-2">
          <ul class="nav justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link">Terms of Use</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Privacy Policy</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Cookie Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <script src="admin/assets/home/js/jquery-3.5.1.min.js"></script>

  <script src="admin/assets/home/js/bootstrap.bundle.min.js"></script>

  <script src="admin/assets/home/js/owl.carousel.min.js"></script>

  <script src="admin/assets/home/js/wow.min.js"></script>

  <script src="admin/assets/home/js/mobster.js"></script>

</body>

</html>