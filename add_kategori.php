<?php
session_start(); // Memulai sesi PHP
require_once("bwatkonek.php"); // Menyertakan file koneksi ke database

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="navbar">
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
        <h1>Tambah Kategori</h1>
        <form action="add_kategori_action.php" method="POST">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" id="nama_kategori" name="nama_kategori" required> <!-- Input nama kategori -->
            <br>

            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi" name="deskripsi" required> <!-- Input deskripsi kategori -->
            <br>

            <input type="submit" value="Tambah"> <!-- Tombol kirim -->
        </form>
        <a href="list_kategori.php">Kembali ke Daftar Kategori</a> <!-- Tautan kembali -->
    </div>
</body>
</html>
a