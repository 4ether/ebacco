-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 09:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penku`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `detail`, `image`, `kategori`) VALUES
(1, 'Minyak SunCO 2 Liter', 45000, 'Selamat datang di toko online kami! Kami dengan bangga mempersembahkan Minyak Goreng SunCo, pilihan terbaik untuk memasak Anda. Minyak Goreng SunCo hadir dalam kemasan 2 liter praktis dan ekonomis dengan kualitas premium yang terjangkau.', 'minyak-sunco.png', 'Minyak'),
(2, 'Tepung Terigu Segitiga Biru 1kg', 11000, 'Tepung Terigu Segitiga Biru 1kg adalah pilihan terbaik untuk mencapai keberhasilan di dapur Anda. Dengan kemasan praktis 1kg, tepung terigu ini menjadi mitra ideal dalam menciptakan hidangan lezat dan berkualitas.', 'tepung-2.png', 'Tepung Terigu'),
(3, 'Beras Maknyuss 5kg', 60000, 'Beras Maknyuss 5kg hadir untuk memberikan pengalaman makan yang luar biasa dalam setiap hidangan Anda. Kualitas dan kelezatan yang terkandung dalam setiap butir beras ini akan mengubah pengalaman memasak dan menikmati nasi Anda.', 'beras-1.png', 'Beras'),
(4, 'Telur Ayam 10 Butir', 21000, 'Telur Ayam 10 Butir merupakan pilihan sempurna untuk memenuhi kebutuhan protein Anda sehari-hari. Dengan kualitas terbaik, setiap telur memiliki kuning telur yang kaya akan nutrisi penting seperti vitamin, mineral, dan asam amino esensial.', 'telurr.png', 'Telur Ayam'),
(5, 'Indomie Goreng 5pcs', 15000, 'Indomie Goreng adalah pilihan sempurna untuk memenuhi keinginan Anda akan mie goreng lezat dan praktis. Dengan rasa yang khas dan bumbu yang menggugah selera, Indomie memberikan pengalaman makan yang memuaskan setiap kali.', 'mie.png', 'Mie Instan'),
(6, 'Daging Ayam Potong Paha Bawah', 35000, 'Daging Ayam Potong Paha Bawah merupakan pilihan terbaik untuk menciptakan hidangan ayam yang menggugah selera. Potongan daging ini memiliki daging yang empuk, lembut, serta memiliki kandungan lemak yang seimbang untuk rasa dan kekenyangan yang luar biasa.', 'ayam-1.png', 'Daging Ayam'),
(7, 'Teh Celup Sari Wangi Isi 25pcs', 8000, 'Nikmati kelezatan teh dalam setiap sajian dengan Teh Celup Sari Wangi Isi 25pcs. Setiap kantong teh ini menghadirkan cita rasa teh yang segar dan menggugah selera.', 'teh.png', 'Teh'),
(8, 'Susu Ultra Milk 1 Liter', 17000, 'Susu Ultra Milk 1 Liter merupakan pilihan sempurna untuk menjaga kesehatan dan mendukung kehidupan aktif Anda. Diperkaya dengan kalsium, protein, dan vitamin, ini membantu memperkuat tulang, menjaga kesehatan otot, dan memberikan energi yang tahan lama.', 'susu.png', 'Susu'),
(9, 'Gulaku 1kg', 16000, 'Dalam kemasan 1Kg yang praktis, Gulaku memberikan kepraktisan dan kemudahan dalam penggunaannya. Anda memiliki persediaan gula yang cukup untuk berbagai resep makanan, kue, minuman, dan hidangan manis lainnya.', 'gulaku.png', 'Gula'),
(10, 'Sabun Cuci Detergen Rinso 1,8kg', 60000, 'Sabun Cuci Detergen Rinso 1,8kg adalah pilihan terbaik untuk mencuci pakaian Anda. Diformulasikan dengan teknologi canggih, deterjen ini mampu menghilangkan kotoran dan noda dengan sempurna, bahkan pada kondisi pencucian yang paling menantang sekalipun.', 'rinso.png', 'Sabun Cuci Pakaian'),
(11, 'Cartoon Astronout T-Shirts', 50000, 'Tampilkan gaya yang ceria dan energik dengan Cartoon Astronout T-Shirts. Cocok untuk dipakai sehari-hari atau untuk acara santai bersama teman-teman, t-shirt ini akan membuat Anda menjadi pusat perhatian dengan desain yang menarik.', 'astronaut.jpg', 'Baju'),
(12, 'Susu Bubuk Dancow 400g', 45000, 'Dalam kemasan 400g yang praktis, Susu Bubuk Dancow memberikan kemudahan dan kenyamanan dalam penggunaannya. Anda dapat dengan mudah menyajikan susu hangat atau menggunakan susu bubuk ini sebagai bahan untuk minuman, kue, atau makanan lainnya.', 'dancow.png', 'Susu');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `barang_id`, `jumlah`) VALUES
(9, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `kategori`, `deskripsi`, `jumlah`, `tanggal`, `user_id`) VALUES
(1, 'Penjualan', 'Penjualan Hari Ini', '120000', '2023-04-13', 2),
(2, 'Investasi', 'Investasi Masuk', '20000', '2023-04-14', 2),
(3, 'Kerjasama', 'Dana Kerjasama', '60000', '2023-04-15', 2),
(10, 'Penjualan', 'Minyak Bimoli 5L', '90000', '2023-07-04', 2),
(11, 'Sampingan', 'Kerja sampingan', '150000', '2023-07-03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kategori`, `deskripsi`, `jumlah`, `tanggal`, `user_id`) VALUES
(1, 'Pajak', 'Pajak', '30000', '2023-04-13', 2),
(4, 'Bensin', 'Pertamax Turbo', '150000', '2023-07-04', 2),
(5, 'Beli Bahan', 'Bahan Tambahan', '30000', '2023-07-06', 2),
(6, 'Makanan', 'Frozen Food', '35000', '2023-07-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `kategori`, `telp`, `alamat`) VALUES
(1, 'admin', 'admin', 'admin', 'ukm', NULL, NULL),
(2, 'Aspro123', 'aspro@mail.com', '123', 'ukm', NULL, NULL),
(3, 'user', 'user@mail.com', '123', 'pengguna', '087720001923', 'Jl.Kaliurang KM 12, Sardonharjo, Kabupaten Sleman, Yogyakarta'),
(4, 'peru', 'peru@mail.com', '123', 'pengguna', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
