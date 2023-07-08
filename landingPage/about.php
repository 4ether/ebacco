<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PENKU</title>
    <link rel="stylesheet" href="gaya.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,700&display=swap" rel="stylesheet" />
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html"><img class="logo" src="../img/logo.png" /></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-window-close" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../PABW proyek/../index.php">HOME</a></li>
                    <li><a href="">ABOUT</a></li>
                    <li><a href="../Tampilan_Login/login.php">LOGIN</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>PENKU</h1>
            <p>
                Penku atau Pengatur Keuangan, adalah aplikasi berbasis website untuk melakukan pencatatan keuangan bagi
                <br />
                pelaku ukm di Yogyakarta agar memudahkan dalam menunjang usaha kedepannya.
            </p>

        </div>
    </section>

    <!--------landing page------->

    <section class="course">
        <h1>Fitur Utama Penku<h1>
                <p>Berikut adalah fitur - fitur utama yang ada di website Penku ini</p>

                <div class="row">
                    <div class="course-col">
                        <h3>Fitur Dashboard</h3>
                        <p>
                            Di dalam fitur Dashboard ini anda dapat memantu berapa total dari pemasukan dan pengeluaran
                            yang anda dapatkan, tidak hanya itu saja di dalam fitur ini anda juga
                            dapat mengetahui saldo dari hasil pendapatan dan pengeluaran anda.
                            Bukan cuman itu aja loo tapi anda juga bisa memfilter tanggal apabila anda ingin melihat
                            saldo sesuai tanggal yang anda inginkan.</p>
                    </div>

                    <div class="course-col">
                        <h3>Catat Pendapatan</h3>
                        <p>
                            Pada fitur catat pendapatan ini anda dapat melakukan pencatatan pendapatan anda secara
                            mandiri dan pastinya aman looo.
                            Anda dapat mencatat semua pendapatan yang anda dapatkan.</p>
                    </div>

                    <div class="course-col">
                        <h3>Catat Pengeluaran</h3>
                        <p>
                            Pada fitur catat pengeluaran ini anda dapat melakukan pencatatan pengeluaran anda secara
                            mandiri dan pastinya aman looo.
                            Anda dapat mencatat semua pengeluaran yang anda dapatkan.</p>
                    </div>
                </div>
    </section>

    <!--------akhir landing page------->

    <!------ campus ----->

    <section class="campus">
        <h1>Gambaran 3 fitur utama website Penku</h1>
        <p>Di bawah ini adalah gambaran 3 fitur utama dari website Penku ini</p>

        <div class="row">
            <div class="campus-col">
                <img src="../img/Dashboard.png">
                <div class="layer">
                    <h3>Dashboard</h3>
                </div>
            </div>

            <div class="campus-col">
                <img src="../img/Pendapatan.png">
                <div class="layer">
                    <h3>Pendapatan</h3>
                </div>
            </div>

            <div class="campus-col">
                <img src="../img/Pengeluaran.jpeg">
                <div class="layer">
                    <h3>Pengeluaran</h3>
                </div>
            </div>
        </div>
    </section>

    <!------ akhir campus ----->

    <!----- testimoni pelanggan Penku ------->

    <!----- akhir testimoni pelanggan Penku ------->

    <!----- Kontak untuk aksi ------->

    <!----- Akhir Kontak untuk aksi ------->

    <!----- Footer ------->

    <!----- Akhir Footer ------->

    <script>
    var navLinks = document.getElementById("navLinks")

    function showMenu() {
        navLinks.style.right = "0";
    }

    function hideMenu() {
        navLinks.style.right = "-200px";
    }
    </script>

</body>

</html>