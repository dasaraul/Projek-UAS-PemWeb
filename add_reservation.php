<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <!-- Navigasi -->
        <a href="index.php">Beranda</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <a href="list_order_item.php">Item Order</a>
        <a href="list_kategori.php">Kategori</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Keluar</a>
        <?php else: ?>
            <a href="login.php">Masuk</a>
        <?php endif; ?>
    </div>
    <div class="container">
        <center>
            <h1>Tambah Reservasi</h1>
            <!-- Form tambah reservasi -->
            <form action="add_reservasi_action.php" method="POST">
                <table>
                    <tr>
                        <td><label for="customer_id">ID Pelanggan:</label></td>
                        <td><input type="number" id="customer_id" name="customer_id" required></td>
                    </tr>
                    <tr>
                        <td><label for="reservation_date">Tanggal Reservasi:</label></td>
                        <td><input type="date" id="reservation_date" name="reservation_date" required></td>
                    </tr>
                    <tr>
                        <td><label for="reservation_time">Waktu Reservasi:</label></td>
                        <td><input type="time" id="reservation_time" name="reservation_time" required></td>
                    </tr>
                    <tr>
                        <td><label for="number_of_guests">Jumlah Tamu:</label></td>
                        <td><input type="number" id="number_of_guests" name="number_of_guests" required></td>
                    </tr>
                    <tr>
                        <td><label for="special_requests">Permintaan Khusus:</label></td>
                        <td><textarea id="special_requests" name="special_requests"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah"></td>
                    </tr>
                </table>
            </form>
            <a href="list_reservasi.php">Kembali ke Daftar Reservasi</a>
        </center>
    </div>
</body>
</html>
