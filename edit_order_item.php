<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Query untuk memperbarui data item order
    $query = "UPDATE order_items SET order_id='$order_id', menu_item_id='$menu_item_id', quantity='$quantity', price='$price' WHERE order_item_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_order_item.php"); // Arahkan ke halaman daftar item order setelah berhasil
}

// Ambil data item order berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM order_items WHERE order_item_id=$id");
$order_item = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Edit Item Order</h1>
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="text" name="order_id" value="<?php echo $order_item['order_id']; ?>" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="text" name="menu_item_id" value="<?php echo $order_item['menu_item_id']; ?>" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="<?php echo $order_item['quantity']; ?>" required>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo $order_item['price']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>