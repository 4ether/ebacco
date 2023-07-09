<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION["user_id"])) {
    header ("location: ../Tampilan_Login/login.php");
}
$sql = "SELECT * FROM barang";
$res = mysqli_query($konn, $sql);
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
    <link rel="stylesheet" href="style_shop.css?v=<?php echo time(); ?>" />
</head>

<body>
    <section id="header">
        <a href="#"> </a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="../profile/profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li>
                    <a href="../tampilan_cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="page-header">
        <h2>#Stay At Home</h2>
        <p>Belanja sembako dari rumah</p>
    </section>

    <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="pro" onclick="window.location.href='single_product.php?id=<?php echo $row['id']?>' ">
                <img src="../img/products/<?php echo $row['image']?>" alt="">
                <div class="des">
                    <span><?php echo $row['kategori'] ?></span>
                    <h5><?php echo $row['nama']?></h5>
                    <div class=" star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo str_replace(',', '.', number_format($row['harga'])) ?></h4>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
    </section>

    <script src="script.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>

</html>