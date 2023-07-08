<?php
include 'koneksi.php';
session_start();
  if (!isset($_SESSION["user_id"])) {
    header ("location: ../Tampilan_Login/login.php");
  } else {
    $barang_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM barang WHERE id = $barang_id";
    $res = mysqli_query($konn, $sql);
    $item = mysqli_fetch_assoc($res);


    if (isset($_POST['addtocart'])) {
        $qty = $_POST['jumlah'];
        $addcart = mysqli_query($konn, "INSERT INTO cart(user_id, barang_id, jumlah)
                                        VALUES ('$user_id','$barang_id','$qty')");
        if ($addcart) {
            echo "<script>alert('Berhasil Memasukkan Barang Ke Keranjang.')
            window.location = 'shop.php'</script>";
        } else {
            echo "<script>alert('Gagal Memasukkan Barang Ke Keranjang.')
            window.location = 'update_profile.php?id=$barang_id'</script>";
        }

    } else if (isset($_POST['belilangsung'])) {
        $qty = $_POST['jumlah'];
        header("Location: ../tampilan_pembayaran/beli_langsung.php?idbarang=$barang_id&qty=$qty");
    }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Bacco</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" href="style_shop.css?v=<?php echo time(); ?>" />
</head>

<body>
    <section id="header">
        <a href="shop.php"><img src="../img/logo-2.png" class="" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a class="active"  href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="../profile/profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li>
                    <a href="../tampilan_cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="../img/products/<?php echo $item['image']?>" class="img-huge" width="100%" id="MainImg" alt="">
        </div>

        <div class="single-pro-details">
            <h6><?php echo $item['kategori'] ?></h6>
            <h4><?php echo $item['nama']?></h4>
            <h2>Rp <?php echo str_replace(',', '.', number_format($item['harga'])) ?></h2>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <input name="jumlah" type="number" value="1"/>
                        <button type="submit" class="btn btn-light" name="addtocart">Add To Cart</button>
                        <button type="submit" class="btn btn-light" name="belilangsung">Beli Langsung</button>
                    </div>
                </div>
            </form>
            <div>
                <h4>Detail Produk</h4>
                <span><?php echo $item['detail']?></span>
            </div>            
        </div>
    </section>

    <section id="page-foot">
        <h2>Barang Lainnya</h2>
        <p>Daftar barang-barang lainnya</p>
    </section>



    <section id="product1" class="section-p1">

        <div class="pro-container">
            <?php
            $query = mysqli_query($konn, "SELECT * FROM barang ORDER BY rand() LIMIT 4");
            while($row = mysqli_fetch_assoc($query)){
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

    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
    </script>
    <script src="script.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>

</html>