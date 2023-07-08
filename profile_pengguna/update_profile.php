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
        <a href="#"><img src="../img/logo-2.png" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="../setelah_login/shop.php">Shop</a></li>
                <li><a href="../setelah_login/contact.php">Contact</a></li>
                <li><a class="active" href="profile.php">Profile</a></li>
                <li><a href="../index.php">Logout</a></li>
                <li>
                    <a href="../tampilan_cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="page-header">
        <h2>#Profile Update</h2>
        <p>Lengkapi dan edit profile anda</p>
    </section>

    <section id="form-details">
        <img src="../img/updateprofile.svg" alt="">
        <form action="">
            <input type="text" placeholder="Nama">
            <input type="text" placeholder="Email">
            <input type="text" placeholder="No.Telepon">
            <textarea name="" id="" cols="30" rows="10" placeholder="Alamat"></textarea>
            <button type="button" class="btn-primary">Update Profile</button>
        </form>
    </section>

    <script src="script.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>

</html>