<?php
require 'koneksi.php';
error_reporting(0);
$type = $_GET['type'];

if($type === 'ukm') {
    if (isset($_POST["daftar"])) {
        $email = mysqli_real_escape_string($konn, $_POST["daftar_email"]);
        $username = mysqli_real_escape_string($konn, $_POST["daftar_username"]);
        $password = mysqli_real_escape_string($konn, $_POST["daftar_password"]);
        $cpassword = mysqli_real_escape_string($konn, $_POST["daftar_cpassword"]);
    
        $check_email = mysqli_num_rows(mysqli_query($konn, "SELECT email 
                                                            FROM user 
                                                            WHERE email='$email' 
                                                            AND kategori='$type'"));
    
        if($password !== $cpassword) {
            echo "<script>alert('Password Tidak Cocok.');</script>";
        } else if($check_email > 0) {
            echo "<script>alert('Email sudah Terdaftar.');</script>";
        } else {
            $sql = "INSERT INTO user (email, username, password, kategori) VALUES ('$email', '$username', '$password', '$type')";
            $result = mysqli_query($konn, $sql);
    
        if ($result) {
            $_POST["daftar_email"] = "";
            $_POST["daftar_username"] = "";
            $_POST["daftar_password"] = "";
            $_POST["daftar_cpassword"] = "";
            echo "<script>alert('Pengguna Berhasil Mendaftar.');
            </script>";
        } else {
            echo "<script>alert('Pengguna Gagal Mendaftar.');</script>";
        }
      }
    }
    
    if (isset($_POST["login"])) {
        $email = mysqli_real_escape_string($konn, $_POST["email"]);
        $password = mysqli_real_escape_string($konn, $_POST["password"]);
    
        $check_email = mysqli_query($konn, "SELECT id 
                                            FROM user 
                                            WHERE email='$email' 
                                            AND password ='$password'
                                            AND kategori='$type'");
    
        if(mysqli_num_rows($check_email) > 0) {
            $row = mysqli_fetch_assoc($check_email);
            session_start();
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["kategori"] = $row['kategori'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["username"] = $row['username'];
            echo "
            <script> 
                alert('Login Berhasil!'); 
                window.location = '../Tampilan_Menu/index.php'
            </script>";
        } else {
            echo "<script>alert('Login Gagal, Silahkan Cek Kembali');</script>";
        }
    }
}else if($type === 'pengguna') {
    if (isset($_POST["daftar"])) {
        $email = mysqli_real_escape_string($konn, $_POST["daftar_email"]);
        $username = mysqli_real_escape_string($konn, $_POST["daftar_username"]);
        $password = mysqli_real_escape_string($konn, $_POST["daftar_password"]);
        $cpassword = mysqli_real_escape_string($konn, $_POST["daftar_cpassword"]);
    
        $check_email = mysqli_num_rows(mysqli_query($konn, "SELECT email 
                                                            FROM user 
                                                            WHERE email='$email' 
                                                            AND kategori='$type'"));
    
        if($password !== $cpassword) {
            echo "<script>alert('Password Tidak Cocok.');</script>";
        } else if($check_email > 0) {
            echo "<script>alert('Email sudah Terdaftar.');</script>";
        } else {
            $sql = "INSERT INTO user (email, username, password, kategori) VALUES ('$email', '$username', '$password', '$type')";
            $result = mysqli_query($konn, $sql);
    
        if ($result) {
            $_POST["daftar_email"] = "";
            $_POST["daftar_username"] = "";
            $_POST["daftar_password"] = "";
            $_POST["daftar_cpassword"] = "";
            echo "<script>alert('Pengguna Berhasil Mendaftar.');
            </script>";
        } else {
            echo "<script>alert('Pengguna Gagal Mendaftar.');</script>";
        }
      }
    }
    
    if (isset($_POST["login"])) {
        $email = mysqli_real_escape_string($konn, $_POST["email"]);
        $password = mysqli_real_escape_string($konn, $_POST["password"]);
    
        $check_email = mysqli_query($konn, "SELECT id 
                                            FROM user 
                                            WHERE email='$email' 
                                            AND password ='$password'
                                            AND kategori='$type'");
    
        if(mysqli_num_rows($check_email) > 0) {
            $row = mysqli_fetch_assoc($check_email);
            session_start();
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["kategori"] = $row['kategori'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["username"] = $row['username'];
            echo "
            <script> 
                alert('Login Berhasil!'); 
                window.location = '../setelah_login/shop.php'
            </script>";
        } else {
            echo "<script>alert('Login Gagal, Silahkan Cek Kembali');</script>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charsett="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login & Daftar </title>
    <link rel="stylesheet" href="loginpenku.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="POST">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email" value="<?php echo $_POST['email']; ?>"
                            required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" id="myPassword" required>
                    </div>
                    <input type="submit" value="Login" name="login" class="btn solid">

                </form>

                <form action="" class="sign-up-form" method="post">
                    <h2 class="title">Daftar</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="daftar_email"
                            value="<?php echo $_POST["daftar_email"]; ?>" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="daftar_username"
                            value="<?php echo $_POST["daftar_username"]; ?>" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="daftar_password"
                            value="<?php echo $_POST["daftar_password"]; ?>" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Re Type Password" name="daftar_cpassword"
                            value="<?php echo $_POST["daftar_cpassword"]; ?>" required />
                    </div>
                    <input type="submit" value="Daftar" class="btn solid" name="daftar">

                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Baru Dengan Kami?</h3>
                    <p>Mari Daftar ke PENKU untuk bisa menggunakan berbagai fitur dalam mengatur keuangan dan pencatat
                        keuangan
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Daftar</button>
                </div>

                <img src="../img/login.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Mari Bergabung Dengan Kami</h3>
                    <p> Penku atau Pengatur Keuangan, adalah aplikasi berbasis website untuk melakukan pencatatan
                        keuangan bagi pelaku ukm di Yogyakarta agar memudahkan dalam menunjang usaha kedepannya.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Login</button>
                </div>

                <img src="../img/gbr1.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>