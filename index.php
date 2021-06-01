<?php 

$judul = "Dashboard";
include "view/header.php";
include "config/config.php";
include "config/id_generator.php";

$barang = mysqli_query($db_penjualan, "SELECT COUNT(*) FROM barang");
$transaksi = mysqli_query($db_penjualan, "SELECT COUNT(*) FROM transaksi");
$jumlah_barang = total($barang);
$jumlah_transaksi = total($transaksi);
?>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Jumlah Barang -->
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                JUMLAH BARANG</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_barang; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah transaksi -->
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                JUMLAH TRANSAKSI</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_transaksi ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                JUMLAH KASIR</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        
                    </div>
<?php
include "view/footer.php"; ?>