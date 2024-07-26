<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Query untuk menambah data item order
    $query = "INSERT INTO order_items (order_id, menu_item_id, quantity, price) VALUES ('$order_id', '$menu_item_id', '$quantity', '$price')";
    mysqli_query($mysqli, $query);

    header("Location: list_order_item.php"); // Arahkan ke halaman daftar item order setelah berhasil
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Tambah Item Order</h1>
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="text" name="order_id" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="text" name="menu_item_id" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
