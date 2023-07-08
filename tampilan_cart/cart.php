<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

$id = $_SESSION["user_id"];

$tabel = mysqli_query($konn, "SELECT cart.id, user.username, user.telp, user.alamat, barang.nama, barang.harga, barang.image, cart.jumlah 
                            FROM `cart` 
                            JOIN `barang` ON barang_id = barang.id
                            JOIN `user` ON user_id = user.id
                            WHERE user_id = $id");

$subtotal = mysqli_query($konn, "SELECT cart.id, user.username, SUM(barang.harga*cart.jumlah) AS 'total' 
                                FROM `cart` 
                                JOIN `barang` ON barang_id = barang.id 
                                JOIN `user` ON user_id = user.id 
                                WHERE user_id = $id");

    // Check if the "Bayar" button is clicked
    if (isset($_POST['bayar'])) {
        // Reset the cart database
        mysqli_query($konn, "DELETE FROM `cart` WHERE user_id = $id");
        // Redirect to a success page or any other desired action
        header("Location: ../tampilan_pembayaran/selesai.php");
        exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_cart.css?v=<?php echo time(); ?>" />
</head>

<body>
    <section id="header">
        <a href="../setelah_login/shop.php"><img src="../img/logo-2.png" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="../setelah_login/shop.php">Shop</a></li>
                <li><a href="../setelah_login/contact.php">Contact</a></li>
                <li><a href="../profile/profile.php">Profile</a></li>
                <li><a href="../index.php">Logout</a></li>
                <li>
                    <a class="active" href=""><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="page-header">
        <h2>#Keranjang</h2>
        <p>Daftar barang-barang belanja anda</p>
    </section>

    <section id="cart" class="section-p1">
        <?php
            if (mysqli_num_rows($tabel) > 0) {
        ?>
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($tabel)){
                $linkdelete = 'delete.php?id='.$row['id'].'';
            ?>
            <tbody>
                <tr>
                    <td><a href="<?php echo $linkdelete ?>"><i class="fas fa-times-circle times"></i></a></td>
                    <td><img src="../img/products/<?php echo $row['image']?>" alt=""></td>
                    <td><?php echo $row['nama']?></td>
                    <td>Rp <?php echo str_replace(',', '.', number_format($row['harga'])) ?></td>
                    <td><input type="number" value="<?php echo $row['jumlah']?>" class="quantity-input" data-price="<?php echo $row['harga'] ?>"></td>
                    <td class="subtotal">Rp <?php echo str_replace(',', '.', number_format($row['harga'] * $row['jumlah'])) ?></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
        <?php
            } else {
        ?>
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
        </table>
        <?php } ?>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="subtotal">
            <?php
                $user = mysqli_query($konn, "SELECT * FROM user WHERE id = '$id'");
                while ($data = mysqli_fetch_assoc($user)) {
            ?>
            <h3>Alamat</h3>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $data['username'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td><?php echo $data['alamat'] ?>, <?php echo $data['telp'] ?></td>
                </tr>
                <?php }
                $ongkir = 15000;
                
                if (mysqli_num_rows($subtotal) > 0) {
                    while ($row = mysqli_fetch_assoc($subtotal)){
                ?>
                <table>
                    <h3>Ringkasan Belanja</h3>
                    <tr>
                        <td>Harga Barang</td>
                        <td id="harbar">Rp <?php echo str_replace(',', '.', number_format($row['total'])) ?></td>
                    </tr>
                    <tr>
                        <td>Pengiriman</td>
                        <td>Rp <?php echo str_replace(',', '.', number_format($ongkir)) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td id="totals"><strong>Rp <?php echo str_replace(',', '.', number_format($row['total']+$ongkir)) ?></strong></td>
                    </tr>
                </table>
                <form action="" method="POST">
                    <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
                </form>   
                <?php } 
                } else {
                ?>
                <h3>Ringkasan Belanja</h3>
                <table>  
                    <tr>
                        <td>Harga Barang</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Pengiriman</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>-</strong></td>
                    </tr>
                </table>
                <?php } ?>
        </div>
    </section>

    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    
    

    <script>
        // Get all quantity input fields
        const quantityInputs = document.querySelectorAll('.quantity-input');

        // Add event listener to each quantity input
        quantityInputs.forEach(input => {
            input.addEventListener('input', () => {
            // Get the price and calculate the new subtotal
            const price = parseInt(input.dataset.price);
            let quantity = parseInt(input.value);

            // Ensure quantity is not zero or negative
            if (isNaN(quantity) || quantity <= 0) {
                quantity = 1;
                input.value = quantity;
            }

            const subtotalElement = input.parentElement.nextElementSibling;
            const subtotal = price * quantity;

            // Update the subtotal text
            subtotalElement.textContent = 'Rp ' + subtotal.toLocaleString();

            // Calculate the sum of all subtotals
            const allSubtotals = document.querySelectorAll('.subtotal');
            let totalSum = 0;
            allSubtotals.forEach(subtotal => {
                const subtotalValue = parseInt(subtotal.textContent.replace(/[^\d]/g, ''));
                totalSum += subtotalValue;
            });
            
            const totalSums = totalSum + 15000;

            // Display the total sum
            const totalElement = document.querySelector('#harbar');
            totalElement.textContent = 'Rp ' + totalSum.toLocaleString();

            // Display Harga Barang + Pengiriman (Total)
            const totalElements = document.querySelector('#totals strong');
            totalElements.textContent = 'Rp ' + totalSums.toLocaleString();

            // You can also send an AJAX request to update the subtotal in the database
            // using the new quantity value if necessary
            });
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var hargaBarang = document.getElementById('harbar').innerText.replace('Rp', '').trim();
        var bayarButton = document.querySelector('button[name="bayar"]');

        // Function to disable or enable the submit button
            function toggleBayarButton() {
            if (hargaBarang === '0') {
                bayarButton.disabled = true;
            } else {
                bayarButton.disabled = false;
            }
        }
        
        // Initial check when the page loads
        toggleBayarButton();
        
        // Check when the "Harga Barang" value changes
        var observer = new MutationObserver(function() {
        toggleBayarButton();
        });
        observer.observe(document.getElementById('harbar'), { childList: true, subtree: true });
    });
    </script>


</body>

</html>