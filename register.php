<?php
include "config/config.php";
include "config/register_act.php";
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="img/kelompokb.png" width="460px", height="460px"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                            </div>
                            <form class="user" method="POST">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="namalengkap"
                                        placeholder="Nama Lengkap" name="nama_lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username"
                                        placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nohp"
                                        placeholder="No. Handphone" name="nohp" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="alamat"
                                        placeholder="Alamat" name="alamat" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="Password" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="Password2" placeholder="Repeat Password" name="password2" required>
                                    </div>
                                </div>
                                <div class="daftar">
                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="daftar" id="daftar">Register Account</button>
                                </div>
                                
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- js sweetalert -->
    <!-- <script src="package/src/sweetalert2.js"></script> -->
    <script src="package/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="package/dist/sweetalert2.min.js"></script> -->
    <?php 
    if(isset($_POST["daftar"])):
        if (regist($_POST) > 0) { ?>
        <script>
            Swal.fire('Registrasi Berhasil', 'Silahkan klik OK untuk login', 'success').then  (ok => {
                if (ok){
                    window.location.href = "login.php";
                }
            });
        </script>
        <?php } else { ?>
            <script>
            Swal.fire('Registrasi Gagal', 'Silahkan coba lagi', 'error');
        </script>
        <?php }
     endif; ?>
    

</body>

</html>