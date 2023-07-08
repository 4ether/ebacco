<?php
include 'koneksi.php';
session_start();

$cart_id = $_GET['id'];
$delete = mysqli_query($konn, "DELETE FROM cart WHERE id = $cart_id");

if ($delete) {
    echo "<script>alert('Berhasil Menghapus Barang Dari Keranjang.')
            window.location = 'cart.php'</script>";
} else {
    echo "<script>alert('Gagal Menghapus Barang Dari Keranjang.')
            window.location = 'cart.php'</script>";
}

?>