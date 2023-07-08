<?php
    if (isset($_POST['update'])) {
        $username = mysqli_real_escape_string($konn, $_POST["username"]);
        $email = mysqli_real_escape_string($konn, $_POST["email"]);
        $id = $_POST['id'];
    
        $check_email = mysqli_num_rows(mysqli_query($konn, "SELECT email
                                                            FROM user
                                                            WHERE email='$email'
                                                            AND kategori='pengguna'"));
    
        if ($check_email > 0) {
            echo "<script>alert('Email sudah Terdaftar.');</script>";
        }else {
            $sql = "UPDATE user SET username = $username , email = $email WHERE id = $id";
            $result = mysqli_query($konn, $sql);
        }
    
        if ($result) {
            $_SESSION["user_id"] = $id;
            $_SESSION["email"] = $_POST['email'];
            $_SESSION["username"] = $_POST['username'];
            echo "
                <script> 
                    alert('Update Berhasil!'); 
                    window.location = 'profile.php'
                </script>";
        }else {
            echo "
                <script> 
                    alert('Profil Edit Gagal!'); 
                    window.location = 'update_profile.php?id=".$id."'
                </script>";
        }
    
    }
?>