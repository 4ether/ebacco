<?php
  include "koneksi.php"; 
  session_start();
  if (!isset($_SESSION["user_id"])) {
    header ("location: ../Tampilan_Login/login.php");
  }else{
    $sql = "SELECT * FROM user WHERE id ='$_SESSION[user_id]'";
    $res = mysqli_query($konn, $sql);
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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <section id="header">
        <a href="#"></a>

        <div>
            <ul id="navbar">
                <li><a href="../setelah_login/shop.php">Shop</a></li>
                <li><a href="../setelah_login/contact.php">Contact</a></li>
                <li><a class="active" href="#">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li>
                    <a href="../tampilan_cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="page-header">
        <h2>#Profile</h2>
        <p>Lengkapi dan edit profile anda</p>
    </section>

    <div class="main-settings" id="main-settings">
        <?php
        while($row = mysqli_fetch_assoc($res)) {
        ?>
        <div class="user-title">
            <img src="../img/profil.svg" alt="">
            <p class="nama">Nama : <?php echo $row['username'] ?></p>
            <p class="email">E-mail : <?php echo $row['email'] ?></p>
            <button class="btn btn-primary" onclick="window.location.href='update_profile.php'">Update Profile</button>
        </div>
        <?php } ?>
    </div>

    <script src="script.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>

</html>