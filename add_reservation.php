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
    <title>Tambah Reservasi</title>
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
        <h2>Tambah Reservasi</h2>
        <form action="add_reservasi_action.php" method="post">
            <table>
                <tr>
                    <td>ID Pelanggan:</td>
                    <td><input type="number" name="customer_id" required></td>
                </tr>
                <tr>
                    <td>Tanggal Reservasi:</td>
                    <td><input type="date" name="reservation_date" required></td>
                </tr>
                <tr>
                    <td>Waktu Reservasi:</td>
                    <td><input type="time" name="reservation_time" required></td>
                </tr>
                <tr>
                    <td>Jumlah Tamu:</td>
                    <td><input type="number" name="number_of_guests" required></td>
                </tr>
                <tr>
                    <td>Permintaan Khusus:</td>
                    <td><textarea name="special_requests"></textarea></td>
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
