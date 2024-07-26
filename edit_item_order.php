<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE order_items SET order_id='$order_id', menu_item_id='$menu_item_id', quantity='$quantity' WHERE order_item_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_item_order.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM order_items WHERE order_item_id=$id");
$item_order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Item Order</h1>
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="number" name="order_id" value="<?php echo $item_order['order_id']; ?>" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="number" name="menu_item_id" value="<?php echo $item_order['menu_item_id']; ?>" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="<?php echo $item_order['quantity']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
