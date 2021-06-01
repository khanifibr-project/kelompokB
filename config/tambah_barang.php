<?php 

function tambah($db, $id_barang, $nama_barang, $stok_barang, $harga_barang){
    mysqli_query($db, "INSERT INTO barang VALUES (null, '$id_barang', '$nama_barang', '$stok_barang', '$harga_barang')");
    return mysqli_affected_rows($db);
}
