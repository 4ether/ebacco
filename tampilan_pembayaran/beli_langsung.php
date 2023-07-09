<?php
include 'koneksi.php';
session_start();

$barang_id = $_GET['idbarang'];
$qty = $_GET['qty'];

if (!isset($_SESSION["user_id"])) {
    header ("location: ../Tampilan_Login/login.php");
  } else {
    
    $user_id = $_SESSION['user_id'];
    

    $sql = "SELECT * FROM barang WHERE id = $barang_id";
    $res = mysqli_query($konn, $sql);
    $item = mysqli_fetch_assoc($res);
    

    if (isset($_POST['bayar'])) {
        $qty = $_POST['jumlah'];
        $total = $qty * $item['harga'];
        header("Location: ../tampilan_pembayaran/konfirmasi.php?total=$total");
    }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Bako</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
</head>

<body>
    <section id="header">
        <a href="../setelah_login/shop.php"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="../setelah_login/contact.php">Contact</a></li>
                <li><a href="../profile/profile.php">Profile</a></li>
                <li><a href="../index.php">Logout</a></li>
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
            <div class="row">
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <input name="jumlah" type="number" value="<?php echo $qty ?>"/>
                            <button type="submit" class="btn btn-light" name="bayar">Bayar</button>
                        </div>
                    </div>
                </form>
            </div>
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