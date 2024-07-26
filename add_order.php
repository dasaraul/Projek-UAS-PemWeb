<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    $query = "INSERT INTO orders (order_date, order_time, total_amount, status) VALUES ('$order_date', '$order_time', '$total_amount', '$status')";
    mysqli_query($mysqli, $query);

    header("Location: list_order.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Order</h1>
        <form method="POST" action="">
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" required>
            <br>

            <label for="order_time">Order Time:</label>
            <input type="time" name="order_time" required>
            <br>

            <label for="total_amount">Total Amount:</label>
            <input type="number" step="0.01" name="total_amount" required>
            <br>

            <label for="status">Status:</label>
            <input type="text" name="status" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
