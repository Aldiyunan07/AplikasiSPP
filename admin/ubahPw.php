<?php
include 'header.php';
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="ml-3 mt-3 mb-0 font-size-18">Ganti Password</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Ganti Password</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <form method="post">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td> Password </td>
                                            <td> <input type="password" name="pwlama" class='form-control' id=""> </td>
                                        </tr>
                                        <tr>
                                            <td> Password Baru </td>
                                            <td> <input type="text" autocomplete="off" name="pwbaru" class="form-control" id=""> </td>
                                        </tr>
                                        <tr>
                                            <td> Konfirmasi Password Baru </td>
                                            <td> <input type="text" name="pwkonfir" autocomplete="off" class="form-control" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a href="index.php" class="btn btn-danger"> Kembali </a>
                                                <button type="submit" name="ubah" class="btn btn-success"> Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if($_SESSION['login'] == "admin" ){
    if(isset($_POST['ubah'])){
    $pswlama   = MD5($_POST['pwlama']);
    $pwbaru   = MD5($_POST['pwbaru']);
    $pwkonfir = MD5($_POST['pwkonfir']);
    $cek      = mysqli_query($konek,"SELECT * FROM admin WHERE password='$pswlama'");
    $ceknum   = mysqli_num_rows($cek);
    if($ceknum > 0 ){
        if($pwbaru == $pwkonfir){
            $sql = mysqli_query($konek,"UPDATE admin SET password ='$pwkonfir' WHERE password='$pswlama'");
            if($sql){
        echo "<script>
                Swal.fire({
                    title: 'Ganti Password Berhasil ',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('index.php')
                }
                });
        
            </script>
        "; 
    }else{
        echo "<script>
                Swal.fire({
                    title: 'Ganti Password Gagal',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('ubahPw.php')
                }
                });
        
            </script>
        "; 
    }
        }else{
            echo "<script>
                Swal.fire({
                    title: 'Konfirmasi Password Salah ',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('ubahPw.php')
                }
                });
        
            </script>
        "; 
        }
    }else{
        echo "<script>
                Swal.fire({
                    title: 'Password Lama Salah! ',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('ubahPw.php')
                }
                });
        
            </script>
        "; 
    }
    
    }
}elseif($_SESSION['login'] !== "admin"){
    if(isset($_POST['ubah'])){
        $pwlama   = MD5($_POST['pwlama']);
        $pwbaru   = MD5($_POST['pwbaru']);
        $pwkonfir = MD5($_POST['pwkonfir']);
        $cek      = mysqli_query($konek,"SELECT * FROM tb_tu WHERE password='$pwlama'");
        $ceknum   = mysqli_num_rows($cek);
        if($ceknum > 0 ){
            if($pwbaru == $pwkonfir){
                $sql = mysqli_query($konek,"UPDATE tb_tu SET password ='$pwkonfir' WHERE password='$pwlama'");
                if($sql){
            echo "<script>
                    Swal.fire({
                        title: 'Ganti Password Berhasil ',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then(function(result) {
                    if (result.value) {
                        location.assign('index.php')
                    }
                    });
            
                </script>
            "; 
        }else{
            echo "<script>
                    Swal.fire({
                        title: 'Ganti Password Gagal',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then(function(result) {
                    if (result.value) {
                        location.assign('ubahPw.php')
                    }
                    });
            
                </script>
            "; 
        }
            }else{
                echo "<script>
                    Swal.fire({
                        title: 'Konfirmasi Password Salah ',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then(function(result) {
                    if (result.value) {
                        location.assign('ubahPw.php')
                    }
                    });
            
                </script>
            "; 
            }
        }else{
            echo "<script>
                    Swal.fire({
                        title: 'Password Lama Salah! ',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then(function(result) {
                    if (result.value) {
                        location.assign('ubahPw.php')
                    }
                    });
            
                </script>
            "; 
        }
        
        }
}
?>
<?php
include 'footer.php';
?>