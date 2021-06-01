<?php 
include "config.php"; 
include "id_generator.php";

function regist($data){
    global $db_penjualan;


    $id_kasir = generator("KSR00", $db_penjualan, "kasir");
    $nama_lengkap = $data["nama_lengkap"];
    $username = $data["username"];
    $nohp = $data["nohp"];
    $alamat = $data["alamat"];
    $password = mysqli_real_escape_string($db_penjualan, $data["password"]);
    $password2 = mysqli_real_escape_string($db_penjualan, $data["password2"]);

    // cek username
    $user = mysqli_query($db_penjualan, "SELECT * FROM kasir WHERE username = '$username'");
    
    if (mysqli_fetch_assoc($user)){ ?>
        <script src="../package/dist/sweetalert2.all.min.js"></script>
        <script>Swal.fire('Username telah digunakan', 'Silahkan isi form kembali', 'error')</script>
        
        <?php exit;

     }

     
    // cek password
    if ($password != $password2){ ?>
        <script src="../package/dist/sweetalert2.all.min.js"></script>
        <script>Swal.fire("Konfirmasi Password salah", "Silahkan isi form kembali", "error")</script>
        

    <?php exit; }  
    else {

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // insert to database

        mysqli_query($db_penjualan,"INSERT INTO kasir VALUES (null, '$id_kasir', '$nama_lengkap', '$nohp', '$alamat', '$username', '$password')");

        return mysqli_affected_rows($db_penjualan);
    }

}