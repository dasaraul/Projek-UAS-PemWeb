<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    // Query untuk memperbarui data order
    $query = "UPDATE orders SET order_date='$order_date', order_time='$order_time', total_amount='$total_amount', status='$status' WHERE order_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_order.php"); // Arahkan ke halaman daftar order setelah berhasil
}

// Ambil data order berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE order_id=$id");
$order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Edit Order</h1>
        <form method="POST" action="">
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" value="<?php echo $order['order_date']; ?>" required>
            <br>

            <label for="order_time">Order Time:</label>
            <input type="time" name="order_time" value="<?php echo $order['order_time']; ?>" required>
            <br>

            <label for="total_amount">Total Amount:</label>
            <input type="number" step="0.01" name="total_amount" value="<?php echo $order['total_amount']; ?>" required>
            <br>

            <label for="status">Status:</label>
            <input type="text" name="status" value="<?php echo $order['status']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
