<?php

function barang($db){
    $barang = mysqli_query($db, "SELECT * FROM barang");
    return $barang;
}