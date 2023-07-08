<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

include 'koneksi.php';

if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, ($_POST["password"]));
    $cpassword = mysqli_real_escape_string($koneksi, ($_POST["cpassword"]));

    if ($password === $cpassword) {
            $sql = "UPDATE user SET email='$email', username = '$username', password='$password' WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($koneksi, $sql);

            if ($result) {
                echo "<script>alert('Profile Updated successfully.')
                window.location = 'index.php'</script>";
                

            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $koneksi->error;
            }
        
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="profilestyle.css?v=<?php echo time(); ?>">
    <title>Profile Update</title>
</head>
<body class="profile-page">
    <div class="wrapper">
        <h2>Profile Update</h2>
        <img src="../img/updateprofile.svg" alt="">
        <form action="" method="post" enctype="multipart/form-data">

            <?php 
            
            $sql = "SELECT * FROM user WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="inputUpdate">
                <p> Email </p>
                <input type="text" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="inputUpdate">
                <p> Nama </p>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>" required>
            </div>
            <div class="inputUpdate">
                <p> Password </p>
                <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
            </div>
            <div class="inputUpdate">
                <p> Confirm Password </p>
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
            </div>
            <?php
                }
            }

            ?>
            <div>
                <button type="submit" name="submit" class="btn">Update Profile</button>
            </div>
        </form>
    </div>
</body>
</html>