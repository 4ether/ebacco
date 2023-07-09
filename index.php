<?php
require "koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Bacco</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,700&display=swap" rel="stylesheet" />
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.php"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-window-close" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="../E-Bako/tampilan_shop/shop.php">Shop</a></li>
                    <li><a href="../E-Bako/tampilan_contact/contact.php">Contact</a></li>
                    <li><a href="../E-Bako/Tampilan_Login/login.php?type=pengguna">Login</a></li>
                    <li><a href="../E-Bako/Tampilan_Login/login.php?type=ukm">Admin</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>
        <div class="text-box">
            <h1>E-Bacco</h1>
            <p>
                E - Bacco ini adalah aplikasi jual beli yang menjual khusus bahan bahan sembako.
                <br> Aplikasi ini dapat membantu masyarakat dan toko kelontong dalam membeli sembako, serta
                mempermudah penjual sembako dalam memantau penjualan barang,
            </p>
            <a href="../E-Bako/Tampilan_Login/login.php" class="hero-btn">Daftar </a>
        </div>
    </section>

    <!--------landing page------->

    <section class="course">
        <h1>Fitur Utama E-Bacco<h1>
                <p>Berikut adalah fitur - fitur utama yang ada di website E-Bako ini</p>

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
        <h1>Gambaran 3 fitur utama website E-Bacco</h1>
        <p>Di bawah ini adalah 3 fitur utama dari website E-Bacco ini</p>

        <div class="row">
            <div class="campus-col">
                <img src="img/Dashboard.png">
                <div class="layer">
                    <h3>Dashboard</h3>
                </div>
            </div>

            <div class="campus-col">
                <img src="img/Pendapatan.png">
                <div class="layer">
                    <h3>Pendapatan</h3>
                </div>
            </div>

            <div class="campus-col">
                <img src="img/Pengeluaran.png">
                <div class="layer">
                    <h3>Pengeluaran</h3>
                </div>
            </div>
        </div>
    </section>

    <!------ akhir campus ----->

    <!----- testimoni pelanggan E-Bako ------->

    <section class="testimoni">
        <h1>Apa kata para Pengguna E-Bacco</h1>
        <p>Berikut adalah testimoni dari pengguna website E-Bako</p>

        <div class="row">
            <div class="testimoni-col">
                <img src="img/JH.jpg">
                <div>
                    <p>
                        Website E-Bako ini sangat membantu saya dalam melakukan pencatatan keuagan UKM saya.
                        Dulu saya sangat bingung sekali bagaimana melakukan pencatatan keuangan UKM saya,
                        tetapi setelah saya mengenal E-Bacco saya menjadi lebih mudah dalam melakukan pencatatan keuangan
                        UKM saya.
                    </p>
                    <h3>Jaya Hartono</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>

            <div class="testimoni-col">
                <img src="img/BS.png">
                <div>
                    <p>
                        Dulu saya selalu mencatat hasil pendapatan dan pengeluaran UKM saya di buku dan itu ada sebagian
                        catatan saya hilang.
                        Kejadian itu sangat membuat saya khawatir karena saya harus menulis dan mengingat - ingat
                        catatan pendapatan dan pengeluaran UKM saya lagi.
                        Tapi setelah saya menggunakan website E-Bako ini saya merasa sangat senang karena saya bisa
                        mencatat pendapatan dan pengeluaran saya secara berkala dan pastinya data saya aman.</p>
                    <h3>Budi Sudarsono</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
            </div>
        </div>
    </section>

    <!----- akhir testimoni pelanggan E-Bako ------->

    <!----- Kontak untuk aksi ------->

    <section class="cta">
        <h1>Tunggu Apa Lagi Mari Daftarkan UKM Anda dan Nikmati Fitur Yang Kami Sediakan</h1>
        <a href="../E-Bako/Tampilan_Login/login.php" class="hero-btn">Daftar </a>
    </section>

    <!----- Akhir Kontak untuk aksi ------->

    <!----- Footer ------->

    <section class="footer">
        <h4>Contact Us</h4>
        <ul>
            <li><a href="">20523193@students.uii.ac.id</a></li>
            <li><a href="">21523168@students.uii.ac.id</a></li>
            <li><a href="">21523094@students.uii.ac.id</a></li>
            <li><a href="">21523140@students.uii.ac.id</a></li>
        </ul>
        <p>
            Drop By
            Jl.Kaliurang 14,5, Krawitan, Umbulmartani, Ngemplak, Sleman Regency, Special Region of Yogyakarta 55584
        </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made with <i class="fa fa-heart-o"></i> by Foursome</p>
    </section>

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