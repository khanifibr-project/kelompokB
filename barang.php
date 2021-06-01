<?php

$judul = "Daftar Barang";
include "view/header.php";
include "config/config.php";
include "config/daftar_barang.php"; 
include "config/id_generator.php";
include "config/tambah_barang.php";
include "config/ubah_barang.php";

$data = barang($db_penjualan);

// tambah barang
$id_barang = generator("BRG00", $db_penjualan, "barang");
?>

                    <!-- DataTales Barang -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
                        </div>
                        <div class="card-body">

                        <a href="" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalTambah" style="margin-bottom: 12px; float:right;"><span class="icon text-white-50"><i class="fas fa-plus" aria-hidden="true"></i></span><span class="text">Tambah Barang</span></a>

                        <!-- Modal tambah -->
                        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true" >
                            <div class="modal-dialog" role="document" style="width: 400px; text-align:center;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Barang</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                        </button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="kode_barang">Kode Barang :</label>
                                                    <input type="text" id="kode_barang" class="form-control" name="kode_barang" value="<?= $id_barang; ?>" disabled><br>
                                                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required><br>
                                                    <input type="number" class="form-control" name="stok_barang" placeholder="Stok Barang" required><br>
                                                    <input type="number" class="form-control" name="harga_barang" placeholder="Harga Barang" required><br>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script src="package/dist/sweetalert2.all.min.js"></script>
                        <?php
                        if(isset($_POST["tambah"])): 
                            $nama_barang = htmlspecialchars($_POST["nama_barang"]);
                            $stok_barang = htmlspecialchars($_POST["stok_barang"]);
                            $harga_barang = htmlspecialchars($_POST["harga_barang"]);
                            if (tambah($db_penjualan, $id_barang, $nama_barang, $stok_barang, $harga_barang) > 0){ ?>
                                <script>Swal.fire('Berhasil', 'Barang baru berhasil ditambahkan', 'success').then  (ok => {
                                if (ok){
                                    window.location.href = "barang.php";
                                }
                                });
                                </script>
                                
                            <?php } else{ ?>
                                <script>Swal.fire('Gagal', 'Barang baru gagal ditambahkan', 'error')</script>
                            <?php }      
                        endif ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Tersedia</th>
                                            <th>Harga Barang</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Tersedia</th>
                                            <th>Harga Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; 
                                        while ($barang = mysqli_fetch_assoc($data)): ?>
                                        <tr>
                                            <td><?= $i?></td>
                                            <td><?= $barang["id_barang"]; ?></td>
                                            <td><?= $barang["nama_barang"]; ?></td>
                                            <td><?= $barang["stok_barang"]; ?></td>
                                            <td><?= $barang["harga_barang"]; ?></td>
                                            <td style="text-align: center;">

                                                <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalUbah<?=$i?>"><span class="icon text-white-50"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span><span class="text">Ubah</span></button>

                                                <!-- modal Ubah -->
                                                <div class="modal fade" id="modalUbah<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="width: 400px; text-align:center;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Barang</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                                </button>
                                                            </div>
                                                            <form  method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="form-group row">
                                                                            <label for="kode-barang" class="col-sm-4 col-form-label" style="text-align: left;">Id barang</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="id-barang" value="<?=$barang["id_barang"]?>" name="id_barang" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama-barang" class="col-sm-4 col-form-label" style="text-align: left;">Nama barang</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="nama-barang" value="<?=$barang["nama_barang"]?>" name="nama_barang" required>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputPassword" class="col-sm-4 col-form-label" style="text-align: left;">Stok barang</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="number"" class="form-control" id="stok_barang" value="<?=$barang["stok_barang"]?>" name="stok_barang" required>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="harga_barang" class="col-sm-4 col-form-label" style="text-align: left;">Harga barang</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="number" class="form-control" id="harga_barang" value="<?= $barang["harga_barang"]?>" name="harga_barang" required>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $noUbah = "ubah".$i ?>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                    <button id="btn-ubah" class="btn btn-primary" type="submit" name=<?=$noUbah?>>Ubah</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <?php
                                                            if(isset($_POST[$noUbah])){
                                                                if(ubah($barang["id_barang"])){ ?>
                                                                        <script>Swal.fire('Berhasil', 'Barang berhasil diubah', 'success').then  (ok => {
                                                                        if (ok){
                                                                            window.location.href = "barang.php";
                                                                            }
                                                                        });
                                                                    </script>
                                                                    <?php } else { ?>
                                                                        <script>Swal.fire('Gagal', 'Barang gagal diubah', 'error')</script>
                                                                <?php }
                                                            }
                                                            ?>
                                                    </div>
                                                </div>   
                                                
                                                <button id="btnhapus<?= $i ?>" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-trash" aria-hidden="true"></i></span><span class="text">Hapus</span></button>

                                                <script src="package/dist/sweetalert2.all.min.js"></script>
                                                <script>
                                                document.getElementById("btnhapus<?= $i?>").addEventListener("click", function(){
                                                    Swal.fire({
                                                        title:  'Apakah anda yakin?',
                                                        text:   "Anda akan menghapus barang",
                                                        icon:   'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d9534f',
                                                        confirmButtonText: 'Hapus'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            Swal.fire(
                                                            'Dihapus', 'Barang berhasil dihapus', 'success'
                                                            ).then(ok => {
                                                                if(ok){
                                                                    window.location.href = 'config/hapus.php?id=<?=$barang["id_barang"]?>';
                                                                }
                                                            })
                                                        }
                                                    })
                                                });                                                
                                                </script>                                                

                                            </td>
                                        </tr>
                                        <?php $i++; endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <script src="package/dist/sweetalert2.all.min.js"></script>
                    
                    
                    

<?php include "view/footer.php"; ?>