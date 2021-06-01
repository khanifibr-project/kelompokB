<?php
include "config.php";
require "hapus_act.php";

$id_barang = $_GET["id"];

if (hapus($id_barang) > 0){ ?>
        <script src="../package/dist/sweetalert2.all.min.js"></script>
        <script>
         window.location.href = "../barang.php";
        </script>
        
<?php } else { ?>

<?php } ?>