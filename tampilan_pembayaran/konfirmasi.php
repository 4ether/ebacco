<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

$user_id = $_SESSION["user_id"];
$total = $_GET['total'];
$ongkir = 15000;
$pembayaran = str_replace(',', '.', number_format($total+$ongkir));
$total = str_replace(',', '.', number_format($total));
$ongkir = str_replace(',', '.', number_format($ongkir));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Bako</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_cart.css?v=<?php echo time(); ?>" />
</head>

<body>
    <section id="header">
        <a href="../setelah_login/shop.php"><img src="../img/logo-2.png" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="../setelah_login/shop.php">Shop</a></li>
                <li><a href="../setelah_login/contact.php">Contact</a></li>
                <li><a href="../profile/profile.php">Profile</a></li>
                <li><a href="../index.php">Logout</a></li>
                <li>
                    <a class="active" href=""><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
        </div>
    </section>
    <section id="page-header">
        <h2>Invoice</h2>
        <p>Silahkan Untuk Diteliti Lagi</p>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="subtotal">
            <?php
                $user = mysqli_query($konn, "SELECT * FROM user WHERE id = '$user_id'");
                while ($data = mysqli_fetch_assoc($user)) {
            ?>
            <h3>Alamat</h3>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $data['username'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td><?php echo $data['alamat'] ?>, <?php echo $data['telp'] ?></td>
                </tr>
                <?php } ?>
                <table>
                    <h3>Ringkasan Belanja</h3>
                    <tr>
                        <td>Total Harga</td>
                        <td>Rp <?php echo $total ?></td>
                    </tr>
                    <tr>
                        <td>Pengiriman</td>
                        <td>Rp <?php echo $ongkir ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>Rp <?php echo $pembayaran ?></strong></td>
                    </tr>
                </table>
                <button type="button" class="btn btn-primary" onclick="window.location.href='selesai.php'">Bayar</button>
        </div>
    </section>