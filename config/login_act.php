<?php

include "config.php";

$username = $_POST["username"];
$password = $_POST["password"];

// Ambil data dari database

$data = mysqli_query($db_penjualan, "SELECT * FROM kasir WHERE username='$username'");



// cek username
if (mysqli_num_rows($data) === 1){

    // cek password
    $isi_data = mysqli_fetch_assoc($data);
    echo $isi_data["nama_lengkap"];
    
    if(password_verify($password, $isi_data["password"])){
        //set session
        $_SESSION["id_kasir"] = $isi_data["id_kasir"];
        $_SESSION["username"] = $isi_data["username"];
        $_SESSION["nama_lengkap"] = $isi_data["nama_lengkap"];
        $_SESSION["no_hp"] = $isi_data["no_hp"];
        $_SESSION["alamat"] = $isi_data["alamat"];

        header("location: index.php");
        exit;
    }
}

$error = true;

