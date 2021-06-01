<?php
include "config.php";
function generator($nama, $db,  $tbl){
    $no = mysqli_query($db, "SELECT MAX(no) FROM $tbl");
    $bfr = mysqli_fetch_assoc($no);
    $id = $bfr["MAX(no)"] + 1;

    $base = $nama;

    if ($id == null){
        $id = 1;
    } elseif ($id > 9){
        $base = substr($nama, 0, 4);
    } elseif ($id > 99){
        $base = substr($nama, 0, 3);
    }
    $final_id = $base . $id;

    return $final_id;
}

function total($dataset){
    $jumlah = mysqli_fetch_assoc($dataset);
    return $jumlah["COUNT(*)"];
}
