<?php
include "koneksi.php";

// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    // Get the data ID from the URL
    $dataId = $_GET['id'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM pengeluaran WHERE id = $dataId";

    // Execute the deletion query
    $deleteResult = mysqli_query($koneksi, $deleteQuery);

    // Check if the deletion was successful
    if ($deleteResult) {
        // Deletion successful
        $response = "Data berhasil dihapus";
    } else {
        // Deletion failed
        $response = "Data gagal dihapus";
    }
} else {
    // Invalid or missing data ID
    $response = "Invalid data ID";
}

// Send the response back to the client
echo $response;
?>