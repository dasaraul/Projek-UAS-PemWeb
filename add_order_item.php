<?php
require_once("bwatkonek.php"); // Koneksi ke database

// Proses hanya jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape input untuk mencegah SQL injection
    $order_id = mysqli_real_escape_string($mysqli, $_POST['order_id']);
    $menu_item_id = mysqli_real_escape_string($mysqli, $_POST['menu_item_id']);
    $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);

    // Validasi data input
    if (empty($order_id) || empty($menu_item_id) || empty($quantity)) {
        echo "Semua kolom wajib diisi.";
    } else {
        // Menambahkan item order ke database
        $query = "INSERT INTO order_items (order_id, menu_item_id, quantity)
                  VALUES ('$order_id', '$menu_item_id', '$quantity')";
        if (mysqli_query($mysqli, $query)) {
            header("Location: list_order_item.php"); // Redirect setelah berhasil
            exit;
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Item Order</h1>
        <!-- Form tambah item order -->
        <form method="POST">
            <label for="order_id">ID Order:</label>
            <input type="number" id="order_id" name="order_id" required>
            <br>

            <label for="menu_item_id">ID Menu Item:</label>
            <input type="number" id="menu_item_id" name="menu_item_id" required>
            <br>

            <label for="quantity">Jumlah:</label>
            <input type="number" id="quantity" name="quantity" required>
            <br>

            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
