<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES ('$order_id', '$menu_item_id', '$quantity')";
    mysqli_query($mysqli, $query);

    header("Location: list_item_order.php");
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
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="number" name="order_id" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="number" name="menu_item_id" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
