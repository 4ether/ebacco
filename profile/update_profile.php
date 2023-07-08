<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

$id = $_SESSION["user_id"];

if (isset($_POST["update"])) {
    $username = mysqli_real_escape_string($konn, $_POST["username"]);
    $email = mysqli_real_escape_string($konn, $_POST["email"]);
    $telp = mysqli_real_escape_string($konn, $_POST["telp"]);
    $alamat = mysqli_real_escape_string($konn, $_POST["alamat"]);

    $sql = "UPDATE user 
            SET username = '$username', email = '$email', telp = '$telp', alamat = '$alamat'
            WHERE id='$id'";
    $result = mysqli_query($konn, $sql);

    if ($result) {
        echo "<script>alert('Profile Updated successfully.')
        window.location = 'profile.php'</script>";
    } else {
        echo "<script>alert('Profile can not Updated.')
        window.location = 'update_profile.php'</script>";
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
                <li><a href="logout.php">Logout</a></li>
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
        <form action="" method="post">
            <?php
            $sql = "SELECT * FROM user WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($konn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="text" name="username" placeholder="Nama" value="<?php echo $row['username'] ?>">
            <input type="text" name="email" placeholder="Email" value="<?php echo $row['email'] ?>">
            <input type="text" name="telp" placeholder="No.Telepon" value="<?php echo $row['telp'] ?>">
            <textarea name="alamat" id="" cols="30" rows="10" placeholder="Alamat"><?php echo $row['alamat'] ?></textarea>
            <?php } }?>
            <button type="submit" name="update" class="btn-primary">Update Profile</button>
        </form>
    </section>

    <script src="script.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>

</html>