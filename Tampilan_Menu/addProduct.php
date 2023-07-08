<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Add Product</title>
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">Tambah Produk</h1>
    <div class="card mt-4">
      <div class="card-body">
        <form action="processAddProduct.php" method="post" enctype="multipart/form-data">
          <!-- Form fields -->
          <div class="mb-3">
            <label for="name" class="form-label"> Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label"> Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
          </div>
          <div class="text-center">
          <a href="javascript:history.go(-1)" class="btn btn-primary">Back</a> <!-- Back button -->
            <button type="submit" name="upload" class="btn btn-success">Tambah Produk</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
