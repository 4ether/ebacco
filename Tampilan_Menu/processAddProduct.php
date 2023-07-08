<?php
include "koneksi.php";

if (isset($_POST['upload'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $kategori = $_POST['kategori'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
      // Get file details
      $fileName = $_FILES['image']['name'];
      $fileTmp = $_FILES['image']['tmp_name'];
      $fileType = $_FILES['image']['type'];
  
      // Set the destination folder
      $destination = '../img/products/' . $fileName;
  
      // Move the uploaded file to the destination folder
      if (move_uploaded_file($fileTmp, $destination)) {
        // File moved successfully
        echo "Upload Gambar berhasil!.";
      } else {
        // Error moving file
        echo "Upload Gambar gagal.";
      }
    } else {
      // No file selected
      echo "Mohon pilih file gambar.";
    }

    $query = "INSERT INTO barang (id, nama, harga, detail, image, kategori) VALUES (NULL, '$name', '$price', '$description', '$image', '$kategori')";
    $hasil = mysqli_query($koneksi, $query);

    if($hasil) {
        echo "
        <script> 
            alert('Produk Berhasil Ditambahkan'); 
            window.location = 'index.php'
        </script>";
    } else {
      echo "
        <script> 
            alert('Produk Gagal Ditambahkan'); 
            window.location = 'addProduct.php'
        </script>" . mysqli_error($koneksi);
    }



  }

?>