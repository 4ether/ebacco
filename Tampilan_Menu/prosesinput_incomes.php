<?php
    include "koneksi.php";

    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $user_id = $_POST['user_id'];

    // proses input
    $simpan  = mysqli_query($koneksi, "INSERT INTO pendapatan(kategori,deskripsi,jumlah,tanggal,user_id) VALUES ('$kategori',
    '$deskripsi', '$jumlah', '$tanggal','$user_id')") or die(mysqli_error($koneksi));
    
    if($simpan){
        echo "
        <script> 
            alert('Data Berhasil Disimpan'); 
            window.location = 'index.php'
        </script>";
    }
?>