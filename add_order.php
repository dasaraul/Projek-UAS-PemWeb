<?php
// Mengecek apakah pengguna sudah login
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h2>Tambah Order</h2>
        <form action="add_order_action.php" method="post">
            <table>
                <tr>
                    <td>ID Pelanggan:</td>
                    <td><input type="number" name="customer_id" required></td>
                </tr>
                <tr>
                    <td>Tanggal Order:</td>
                    <td><input type="date" name="order_date" required></td>
                </tr>
                <tr>
                    <td>Waktu Order:</td>
                    <td><input type="time" name="order_time" required></td>
                </tr>
                <tr>
                    <td>Total Amount:</td>
                    <td><input type="number" step="0.01" name="total_amount" required></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><input type="text" name="status" value="pending" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
