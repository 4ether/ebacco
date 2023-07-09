<?php
require "koneksi.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header ("location: ../Tampilan_Login/login.php");
}

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

        <title>SIM E-Baco</title>
    </head>
    
    <body>
        <!-- Sidebar -->
        <?php
            $tampiluser =mysqli_query($koneksi, "SELECT * FROM user WHERE id ='$_SESSION[user_id]'");
            $user =mysqli_fetch_array($tampiluser);
        ?>

        <div class="main-container d-flex">
            <div class="sidebar" id="side_nav">
                <div class="header-box px-3 pt-3 pb-4 d-flex justify-content-between">
                    <h1 class="fs-4">
                        <span class="text-white"><i class="fad fa-wallet fa-sm"></i> E-Bacco</span>
                    </h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white">
                        <i class="fal fa-stream"></i>
                    </button>
                </div>
                <ul class="list-unstyled px-2">
                    <li class="active">
                        <a href="#dashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a>
                    </li>
                    <li class="">
                        <a href="#pendapatan" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-coins"></i> Pendapatan</a>
                    </li>
                    <li class="">
                        <a href="#pengeluaran" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-receipt"></i> Pengeluaran</a>
                    </li>
                    <li class="">
                        <a href="#produk" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-store"></i> Produk Toko</a>
                    </li> 
                    <li class="">
                        <a href="#statistik" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-chart-pie"></i> Statistik</a>
                    </li>     
                    <li class="">
                        <a href="#profil" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-user-circle"></i> Profil</a>
                    </li>        
                </ul>
                <hr class="h-color mx-2">
                
                <div class="mt-auto list-unstyled px-2">
                    <button class="btn btn-danger text-decoration-none px-3 py-2 d-block" onclick="redirectToPHP()"><i class="fal fa-sign-out-alt"></i> Logout</button>
                </div>

            </div>
            
            <div class="content">
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between d-md-none d-block">
                            <a class="navbar-brand fs-4" href="#"><i class="fal fa-wallet fa-sm"></i> Penku</a>
                            <button class="btn px-1 py-0 open-btn">
                                <i class="fal fa-stream"></i>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link disable" aria-current="page" href="#">Selamat Datang <?=$user['username']?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Akhir Sidebar -->

                <!-- Menu -->

                <!-- Dashboard -->
                <div id="dashboard" class="dashboard-content px-3 pt-4">
                    <div class="user-title">
                        <h2>Jurnal Keuangan Toko <?=$user['username']?></h2>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-sm-max">
                            <!-- Total Saldo -->
                            <?php
                                $tampilpengeluaran =mysqli_query($koneksi, "SELECT ((SELECT SUM(jumlah) AS jumlaaah FROM 
                                pendapatan WHERE 
                                user_id='$_SESSION[user_id]') - (SELECT SUM(jumlah) AS jumlaah FROM pengeluaran WHERE 
                                user_id='$_SESSION[user_id]')) AS total");
                                
                                $data = mysqli_fetch_array ($tampilpengeluaran);
                            ?>
                            <div class="card mb-2 px-4">
                                <h5><i class="fas fa-wallet"></i> Saldo Total</h5>
                                <h2 style="color:green">Rp <?php echo number_format($data['total'], 2, ',' , '.')?></h2>
                            </div>
                            <!-- Akhir Total Saldo -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Total Pengeluaran -->
                            <?php
                                $tampilpengeluaran =mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlaah FROM pengeluaran WHERE 
                                user_id='$_SESSION[user_id]'");
                                $data = mysqli_fetch_array ($tampilpengeluaran);
                            ?>
                            <div class="card mb-2 px-4">
                                <h5><i class="fas fa-receipt"></i></i> Total Pengeluaran</h5>
                                <h2 style="color:red">Rp <?php echo number_format($data['jumlaah'], 2, ',' , '.') ?></h2>
                            </div>
                            <!-- Akhir Total Pengeluaran -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Total Pendapatan -->
                            <?php
                                $tampilpengeluaran =mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlaaah FROM pendapatan WHERE 
                                user_id='$_SESSION[user_id]'");
                                $data = mysqli_fetch_array ($tampilpengeluaran);
                            ?>
                            <div class="card mb-2 px-4">
                                <h5><i class="fas fa-coins"></i> Total Pendapatan</h5>
                                <h2 style="color:green">Rp <?php echo number_format($data['jumlaaah'], 2, ',' , '.')?></h2>
                            </div>
                            <!-- Akhir Total Pendapatan -->
                        </div>    
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Graph Pendapatan -->

                            <!-- PHP Graph Pendapatan -->
                            <?php
                                $graphpendapatan =mysqli_query($koneksi, "SELECT kategori, ROUND((SUM(CAST(jumlah AS DECIMAL(10, 2))) / (SELECT SUM(CAST(jumlah AS DECIMAL(10, 2))) FROM pendapatan)) * 100, 2) AS percentage
                              FROM
                                pendapatan
                              WHERE
                                user_id='$_SESSION[user_id]'
                              GROUP BY
                                kategori");
                                
                                
                                $percentageInvest = 0;
                                $percentageCoop = 0;
                                $percentagePT = 0;
                                $percentageSale = 0;
                                $percentageShare = 0;


                                while ($row = mysqli_fetch_array($graphpendapatan)) {
                                    if ($row['kategori'] === 'Investasi') {
                                        $percentageInvest = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Kerjasama') {
                                        $percentageCoop = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Penjualan') {
                                        $percentageSale = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Saham') {
                                        $percentageShare = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Sampingan') {
                                        $percentagePT = $row['percentage'];
                                    }
                                }


                            ?>
                            <!-- Akhir PHP Graph Pendapatan -->
                            
                            <div class="card mb-2 px-3">
                                <div>
                                    <div class="mt-2 text-center">
                                        <h4>Detail Pendapatan</h4>
                                    </div>
                                    <p>Penjualan</p>
                                    <div class="progress mt-2 mb-2 position-relative">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageSale?>%" aria-valuenow="<?php echo $percentageSale?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageSale?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Investasi</p>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageInvest?>%" aria-valuenow="<?php echo $percentageInvest?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageInvest?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Kerjasama</p>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageCoop?>%" aria-valuenow="<?php echo $percentageCoop?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageCoop?>%
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p>* lebih detail lihat halaman Pendapatan</p>
                                </div>
                            </div>
                            <!-- Akhir Graph Pendapatan --> 
                        </div>
                        <div class="col-sm-6">

                            <!-- Graph Pengeluaran -->

                            <!-- PHP Graph Pengeluaran -->
                            <?php
                                $graphpendapatan =mysqli_query($koneksi, "SELECT kategori, ROUND((SUM(CAST(jumlah AS DECIMAL(10, 2))) / (SELECT SUM(CAST(jumlah AS DECIMAL(10, 2))) FROM pengeluaran)) * 100, 2) AS percentage
                              FROM
                                pengeluaran
                              WHERE
                                user_id='$_SESSION[user_id]'
                              GROUP BY
                                kategori");
                                
                                
                                $percentageMaterial = 0;
                                $percentageFood = 0;
                                $percentageFuel = 0;
                                $percentageTax = 0;
                                $percentageHobby = 0;


                                while ($row = mysqli_fetch_array($graphpendapatan)) {
                                    if ($row['kategori'] === 'Beli Bahan') {
                                        $percentageMaterial = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Makanan') {
                                        $percentageFood = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Bensin') {
                                        $percentageFuel = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Pajak') {
                                        $percentageTax = $row['percentage'];
                                    } elseif ($row['kategori'] === 'Hobby') {
                                        $percentageHobby = $row['percentage'];
                                    }
                                }
                            ?>
                            <!-- Akhir PHP Graph Pengeluaran -->
                            <div class="card mb-2 px-3">
                                <div>
                                    <div class="mt-2 text-center">
                                        <h4>Detail Pengeluaran</h4>
                                    </div>
                                    <p>Beli Bahan</p>
                                    <div class="progress mt-2 mb-2 position-relative">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageMaterial?>%" aria-valuenow="<?php echo $percentageMaterial?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageMaterial?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Makanan</p>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageFood?>%" aria-valuenow="<?php echo $percentageFood?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageFood?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Pajak</p>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageTax?>%" aria-valuenow="<?php echo $percentageTax?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageTax?>%
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p>* lebih detail lihat halaman Pengeluaran</p>
                                </div>
                            </div>
                            <!-- Akhir Graph Pengeluaran -->
                        </div>
                    </div> 
                    <div class="card mb-2 px-2">
                        <div class="card-footer">
                            <div>
                                <form class="input-group" action="" method="POST">
                                    <span class="input-group-text">Filter dari tanggal:</span>
                                    <input name="tgl_mulai" type="date" class="form-control" id="start-date">
                                    <span class="input-group-text">sampai</span>
                                    <input name="tgl_selesai" type="date" class="form-control" id="end-date">
                                    <div class="input-group-append">
                                        <button name="filter_tgl" class="btn btn-success">Filter</button>
                                        <button name="reset_filter" class="btn btn-danger ml-2">Reset</button>
                                    </div>  
                                </form>  
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                // Menampilak filter range tanggal
                                if (isset($_POST['filter_tgl']) && !empty($_POST['tgl_mulai']) && !empty($_POST['tgl_selesai'])) {
                                    $tgl_mulai = $_POST['tgl_mulai'];
                                    $tgl_selesai = $_POST['tgl_selesai'];
                                    echo '<p class="text-center">Menampilkan data dari tanggal <strong>' . $tgl_mulai . '</strong> sampai <strong>' . $tgl_selesai . '</strong></p>';
                                }
                                ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aktivitas</th>
                                            <th>Deskripsi</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                            <th>Hapus Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $lihat = mysqli_query($koneksi, "SELECT * FROM pendapatan WHERE 
                                                    user_id='$_SESSION[user_id]' ORDER BY tanggal ASC");
                                            $lihat2 = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE 
                                                    user_id='$_SESSION[user_id]' ORDER BY tanggal ASC");
                                            
                                            // Filter
                                                if(isset($_POST['filter_tgl'])){
                                                    $mulai = $_POST['tgl_mulai'];
                                                    $selesai = $_POST['tgl_selesai'];
                                                    if($mulai && $selesai){
                                                        $lihat = mysqli_query($koneksi, "SELECT * FROM pendapatan 
                                                                                        WHERE user_id='$_SESSION[user_id]' AND tanggal 
                                                                                        BETWEEN '$mulai' AND '$selesai' 
                                                                                        ORDER BY tanggal DESC");
                                                        $lihat2 = mysqli_query($koneksi, "SELECT * FROM pengeluaran 
                                                                                        WHERE user_id='$_SESSION[user_id]' AND tanggal 
                                                                                        BETWEEN '$mulai' AND '$selesai' 
                                                                                        ORDER BY tanggal DESC");
                                                    }
                                                    
                                                    
                                                }
                                            // Ahkir Filter
                                            
                                            while($data = mysqli_fetch_array($lihat))
                                            {  
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td style="color: green"><?= $data['kategori']; ?></td>
                                            <td><?= $data['deskripsi']; ?></td>
                                            <td style="color: green">+ Rp <?= number_format($data['jumlah'], 2, ',' , '.') ?></td>                                          
                                            <td><?= $data['tanggal']; ?></td>
                                            <td><button class="btn btn-danger" onclick="deleteDataPT(<?= $data['id']; ?>)">Hapus</button></td>
                                        </tr>
                                        <?php } 
                                            while($data2 = mysqli_fetch_array($lihat2))
                                            {  
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td style="color: red"><?= $data2['kategori']; ?></td>
                                            <td><?= $data2['deskripsi']; ?></td>
                                            <td style="color: red">- Rp <?= number_format($data2['jumlah'], 2, ',' , '.') ?></td>            
                                            <td><?= $data2['tanggal']; ?></td>
                                            <td><button class="btn btn-danger" onclick="deleteDataPL(<?= $data2['id']; ?>)">Hapus</button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>           
                    </div>          
                </div>
                <!-- Akhir Dashboard -->
                
                <!-- Pendapatan -->
                <div id="pendapatan" class="dashboard-content px-3 pt-4" style="display: none;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card mb-2 px-3 h-100 d-flex flex-column">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h2>Input Pendapatan</h2>
                                    </div>
                                    <form action="prosesinput_incomes.php" method="POST">
                                        <input type="hidden" id="fname" name="user_id" value="<?php echo $_SESSION['user_id']  ?>" required>
                                        <div class="mb-3">
                                            <label for="kategoriP" class="form-label">Kategori</label>
                                            <select class="form-select" name="kategori" id="kategoriP" placeholder="pilih" required>
                                                <option disabled selected value> -- Pilih --</option>    
                                                <option value="Penjualan">Penjualan</option>
                                                <option value="Investasi">Investasi</option>
                                                <option value="Kerjasama">Kerjasama</option>
                                                <option value="Saham">Saham</option>
                                                <option value="Sampingan">Sampingan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsiP" class="form-label">Deskripsi</label>
                                            <input required type="text" class="form-control" name="deskripsi" id="deskripsiP" placeholder="Deskripsi">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlahP" class="form-label">Jumlah</label>
                                            <input required type="text" class="form-control" name="jumlah" id="jumlahP" placeholder="Nominal">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggalP" class="form-label">Tanggal</label>
                                            <input required type="date" class="form-control" name="tanggal" id="tanggalP">
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mb-2 px-3 h-100 d-flex flex-column">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Aktivitas</th>
                                                    <th>Total</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal</th>
                                                    <th>Hapus Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    $lihat = mysqli_query($koneksi, "SELECT * FROM pendapatan WHERE 
                                                            user_id='$_SESSION[user_id]' ORDER BY tanggal DESC");
                                                    
                                                    
                                                    while($data = mysqli_fetch_array($lihat))
                                                    {  
                                                        ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['kategori']; ?></td>
                                                    <td style="color: green">+ Rp <?= number_format($data['jumlah'], 2, ',' , '.') ?></td>
                                                    <td><?= $data['deskripsi']; ?></td>
                                                    <td><?= $data['tanggal']; ?></td>
                                                    <td><button class="btn btn-danger" onclick="deleteDataPT(<?= $data['id']; ?>)">Hapus</button></td>
                                                </tr>       
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mt-4 mb-2 px-3">
                                <div>
                                <p>Penjualan</p>
                                    <div class="progress mt-2 mb-2 position-relative">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageSale?>%" aria-valuenow="<?php echo $percentageSale?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageSale?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Investasi</p>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageInvest?>%" aria-valuenow="<?php echo $percentageInvest?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageInvest?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Kerjasama</p>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageCoop?>%" aria-valuenow="<?php echo $percentageCoop?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageCoop?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Saham</p>
                                    <div class="progress mt-1 mb-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageShare?>%" aria-valuenow="<?php echo $percentageShare?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageShare?>%   
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Sampingan</p>
                                    <div class="progress mt-1 mb-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentagePT?>%" aria-valuenow="<?php echo $percentagePT?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentagePT?>%
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                <!-- Akhir Pendapatan -->
                
                <!-- Pengeluaran -->
                <div id="pengeluaran" class="dashboard-content px-3 pt-4" style="display: none;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card mb-2 px-3 h-100 d-flex flex-column">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h2>Input Pengeluaran</h2>
                                    </div>
                                    <form action="prosesinput_pengeluaran.php" method="POST">
                                        <input type="hidden" id="fname" name="user_id" value="<?php echo $_SESSION['user_id']  ?>" required>
                                        <div class="mb-3">
                                            <label for="kategoriP2" class="form-label">Kategori</label>
                                            <select class="form-select" name="kategori" id="kategoriP2" placeholder="pilih" required>
                                                <option disabled selected value> -- Pilih --</option>    
                                                <option value="Beli Bahan">Beli Bahan</option>
                                                <option value="Makanan">Makanan</option>
                                                <option value="Bensin">Bensin</option>
                                                <option value="Pajak">Pajak</option>
                                                <option value="Hobi">Hobi</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsiP2" class="form-label">Deskripsi</label>
                                            <input required type="text" class="form-control" name="deskripsi" id="deskripsiP2" placeholder="Deskripsi">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlahP" class="form-label">Jumlah</label>
                                            <input required type="text" class="form-control" name="jumlah" id="jumlahP2" placeholder="Nominal">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggalP" class="form-label">Tanggal</label>
                                            <input required type="date" class="form-control" name="tanggal" id="tanggalP2">
                                        </div>
                                        <button type="submit" class="btn btn-danger w-100">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mb-2 px-3 h-100 d-flex flex-column">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Aktivitas</th>
                                                    <th>Total</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal</th>
                                                    <th>Hapus Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no1 = 1;
                                                    $lihat = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE 
                                                            user_id='$_SESSION[user_id]' ORDER BY tanggal DESC");
                                                
                                                    
                                                    while($data = mysqli_fetch_array($lihat))
                                                    {  
                                                ?>
                                                <tr>
                                                    <td><?= $no1++ ?></td>
                                                    <td><?= $data['kategori']; ?></td>
                                                    <td style="color: red">- Rp <?= number_format($data['jumlah'], 2, ',' , '.') ?></td>
                                                    <td><?= $data['deskripsi']; ?></td>
                                                    <td><?= $data['tanggal']; ?></td>
                                                    <td><button class="btn btn-danger" onclick="deleteDataPL(<?= $data['id']; ?>)">Hapus</button></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mt-4 mb-2 px-3">
                                <div>
                                    <p>Beli Bahan</p>
                                    <div class="progress mt-1 mb-2 position-relative">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageMaterial?>%" aria-valuenow="<?php echo $percentageMaterial?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageMaterial?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Makanan</p>
                                    <div class="progress mt-1 mb-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageFood?>%" aria-valuenow="<?php echo $percentageFood?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageFood?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Bensin</p>
                                    <div class="progress mt-1 mb-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageFuel?>%" aria-valuenow="<?php echo $percentageFuel?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageFuel?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Pajak</p>
                                    <div class="progress mt-1 mb-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageTax?>%" aria-valuenow="<?php echo $percentageTax?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageTax?>%
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Hobi</p>
                                    <div class="progress mt-1 mb-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentageHobby?>%" aria-valuenow="<?php echo $percentageHobby?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $percentageHobby?>%
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                <!-- Akhir Pengeluaran -->

                <!-- Produk Toko -->
                <div id="produk" class="dashboard-content px-3 pt-4" style="display: none;">
                    <div class="row">
                        <div class="col-md-max">
                            <div class="card">
                                <a href="addProduct.php" class="btn btn-success w-100">Tambah Produk</a>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Gambar</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Deskripsi</th>
                                                    <th>Ketegori</th>
                                                    <th>Hapus Barang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no2 = 1;
                                                    $lihat3 = mysqli_query($koneksi, "SELECT * FROM barang");
                                                
                                                    
                                                    while($data3 = mysqli_fetch_array($lihat3))
                                                    {  
                                                    ?>
                                                    <tr>
                                                        <td><?= $no2++ ?></td>
                                                        <td><img src="../img/products/<?php echo $data3['image']?>" alt="..." style="max-width: 100px; height: auto;"></td>
                                                        <td><?= $data3['nama']; ?></td>
                                                        <td style="color: blue">Rp <?= number_format($data3['harga'], 2, ',' , '.') ?></td>
                                                        <td><?= $data3['detail']; ?></td>
                                                        <td><?= $data3['kategori']; ?></td>
                                                        <td><button class="btn btn-danger" onclick="deleteDataBR(<?= $data3['id']; ?>)">Hapus</button></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Produk Toko -->

                <!-- Statistik -->
                <div id="statistik" class="dashboard-content px-3 pt-4" style="display: none;">
                    <div class="row">
                        <div class="col-sm-max d-flex justify-content-center align-items-center">
                            <h4>Graph Statistik Pendapatan dan Pengeluaran</h4>
                        </div>
                        <hr>
                        <div class="col-sm-6">
                            <div class="container">
                                <div class="card">                           
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <canvas id="pieChart" style="width:100%;max-width:600px"></canvas> 
                                    </div> 
                                    <div class="card-title text-center">
                                        <h4>Statistik Pendapatan (Pie Chart)</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="container">
                                <div class="card">                           
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <canvas id="pieChart2" style="width:100%;max-width:600px"></canvas> 
                                    </div> 
                                    <div class="card-title text-center">
                                        <h4>Statistik Pengeluaran (Pie Chart)</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="container">
                                <div class="card">                           
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <canvas id="barChart" style="width:100%;max-width:600px"></canvas> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="container">
                                <div class="card">                           
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <canvas id="barChart2" style="width:100%;max-width:600px"></canvas> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Statistik -->

                
                <!-- Profil -->
                <div id="profil" class="dashboard-content px-3 pt-4" style="display: none;">
                    <div class="row">
                        <div class="col-md mx-auto my-auto">
                            <div class="card text-center">
                                <img src="" alt="">
                                <div class="card-body">
                                    <div class="card-img-top">
                                        <img class="rounded img-thumbnail" src="../img/profil.svg" alt="...">                
                                    </div>
                                    <div class="card-title">
                                        Nama  : <?=$user['username']?>
                                    </div>
                                    <div class="card-title">
                                        Email : <?=$user['email']?>
                                    </div>
                                    <a href="updateprofile.php" class="btn btn-success"><i class="far fa-edit"></i> Ubah Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Profil -->

                <!-- Akhir Menu -->

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       

        <script>
            function deleteDataPT(dataId) {
                // Confirm with the user before performing the deletion
                var confirmation = confirm("Apa anda yakin ingin menghapus data?");
                
                // Proceed with the deletion if the user confirms
                if (confirmation) {
                    // AJAX request to delete the data
                    var xhttp = new XMLHttpRequest();
                    
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Response from the server
                            var response = this.responseText;
                            
                            // Display the response message
                            alert(response);
                            
                            // Optionally, reload the page or perform any other necessary actions
                            location.reload();
                        }
                    };
                    
                    xhttp.open("GET", "delete_dataPT.php?id=" + dataId, true); // Adjust the URL to your backend script
                    xhttp.send();
                }
            }
        </script>
        <script>
            function deleteDataPL(dataId) {
                // Confirm with the user before performing the deletion
                var confirmation = confirm("Apa anda yakin ingin menghapus data?");
                
                // Proceed with the deletion if the user confirms
                if (confirmation) {
                    // AJAX request to delete the data
                    var xhttp = new XMLHttpRequest();
                    
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Response from the server
                            var response = this.responseText;
                            
                            // Display the response message
                            alert(response);
                            
                            // Optionally, reload the page or perform any other necessary actions
                            location.reload();
                        }
                    };
                    
                    xhttp.open("GET", "delete_dataPL.php?id=" + dataId, true); // Adjust the URL to your backend script
                    xhttp.send();
                }
            }
        </script>
        <script>
            function deleteDataBR(dataId) {
                // Confirm with the user before performing the deletion
                var confirmation = confirm("Apa anda yakin ingin menghapus barang?");
                
                // Proceed with the deletion if the user confirms
                if (confirmation) {
                    // AJAX request to delete the data
                    var xhttp = new XMLHttpRequest();
                    
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Response from the server
                            var response = this.responseText;
                            
                            // Display the response message
                            alert(response);
                            
                            // Optionally, reload the page or perform any other necessary actions
                            location.reload();
                        }
                    };
                    
                    xhttp.open("GET", "delete_dataBR.php?id=" + dataId, true); // Adjust the URL to your backend script
                    xhttp.send();
                }
            }
        </script>

        <script>
            // Get the canvas element
            const ctx1 = document.getElementById('pieChart').getContext('2d');

            // Define the chart configuration
            const config1 = {
                type: 'pie',
                data: {
                labels: ['Penjualan', 'Investasi', 'Kerjasama', 'Saham', 'Sampingan'],
                datasets: [{
                    data: [<?php echo $percentageSale?>, <?php echo $percentageInvest?>, <?php echo $percentageCoop?>, <?php echo $percentageShare?>, <?php echo $percentagePT?>],
                    backgroundColor: ['rgb(28, 252, 3)', 'rgb(3, 252, 244)', 'rgb(3, 86, 252)', 'rgb(181, 3, 252)', 'rgb(227, 252, 3)'],
                    hoverOffset: 5
                }]
                }
            };

            // Create the chart
            new Chart(ctx1, config1);         
        </script>

        <script>
            // Get the canvas element
            const ctx2 = document.getElementById('pieChart2').getContext('2d');

            // Define the chart configuration
            const config2 = {
                type: 'pie',
                data: {
                labels: ['Beli Bahan', 'Makanan', 'Bensin', 'Pajak', 'Hobi'],
                datasets: [{
                    data: [<?php echo $percentageMaterial?>, <?php echo $percentageFood?>, <?php echo $percentageFuel?>, <?php echo $percentageTax?>, <?php echo $percentageHobby?>],
                    backgroundColor: ['rgb(181, 3, 252)', 'rgb(252, 3, 140)', 'rgb(0, 255, 247)', 'rgb(0, 128, 255)', 'rgb(255, 0, 221)'],
                    hoverOffset: 5
                }]
                }
            };

            // Create the chart
            new Chart(ctx2, config2);         
        </script>

        <script>
            var xValues = ["Penjualan", "Investasi", "Kerjasama", "Saham", "Sampingan"];
            var yValues = [<?php echo $percentageSale?>, <?php echo $percentageInvest?>, <?php echo $percentageCoop?>, <?php echo $percentageShare?>, <?php echo $percentagePT?>];
            var barColors = ['rgb(28, 252, 3)', 'rgb(3, 252, 244)', 'rgb(3, 86, 252)', 'rgb(181, 3, 252)', 'rgb(227, 252, 3)'];

            
            new Chart("barChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                text: "Statistik Bar Chart Pendapatan (persen)"
                }
            }
            });
        </script>

        <script>
            var xValues = ['Beli Bahan', 'Makanan', 'Bensin', 'Pajak', 'Hobi'];
            var yValues = [<?php echo $percentageMaterial?>, <?php echo $percentageFood?>, <?php echo $percentageFuel?>, <?php echo $percentageTax?>, <?php echo $percentageHobby?>];
            var barColors = ['rgb(181, 3, 252)', 'rgb(252, 3, 140)', 'rgb(0, 255, 247)', 'rgb(0, 128, 255)', 'rgb(255, 0, 221)'];

            
            new Chart("barChart2", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                text: "Statistik Bar Chart Pengeluaran (persen)"
                }
            }
            });
        </script>
        

        <script>
            $(".sidebar ul li").on('click', function(){
                $(".sidebar ul li.active").removeClass('active');
                $(this).addClass('active');
                });

                    $('.open-btn').on('click', function(){
                    $('.sidebar').addClass('active');
                    });

                        $('.close-btn').on('click', function(){
                        $('.sidebar').removeClass('active');
                        })
        </script>

        <script>
            $(document).ready(function () {
                
                function showPage(pageId) {
                    $('.dashboard-content').hide();
                    $(pageId).show();
                }

                $('.sidebar a').on('click', function (event) {
                    event.preventDefault();
                    var pageId = $(this).attr('href');
                    showPage(pageId);
                });

                function handleInitialLoad() {
                    var initialPage = window.location.hash;
                    if (initialPage) {
                        showPage(initialPage);
                    } else {
                        showPage('#dashboard');
                    }
                }

                handleInitialLoad();
            });
        </script>

        <script>
            function filterTable() {
                var startDate = document.getElementById('start-date').value;
                var endDate = document.getElementById('end-date').value;
                
                // Perform table filtering based on the date range
                // Implement your filtering logic here
                
                console.log("Start Date:", startDate);
                console.log("End Date:", endDate);
            }
        </script>

        <script>
            function redirectToPHP() {
                window.location = 'logout.php';
            }
        </script>
    </body>
</html>