<?php 

include "config.php";

function hapus($id){
    global $db_penjualan;
    mysqli_query($db_penjualan, "DELETE FROM barang WHERE id_barang='$id'");

    return mysqli_affected_rows($db_penjualan);
}