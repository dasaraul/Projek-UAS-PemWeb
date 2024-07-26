<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h1>Selamat Datang di Dashboard</h1>

        <?php if (isset($_SESSION['loggedin'])): ?>
            <p>Mode Admin - Anda sedang login</p>
            <a href="add_pelanggan.php">Tambah Pelanggan</a> |
            <a href="add_order.php">Tambah Order</a> |
            <a href="add_reservasi.php">Tambah Reservasi</a> |
            <a href="add_menu.php">Tambah Menu</a>
        <?php else: ?>
            <p>Mode Pengunjung - Anda tidak login</p>
        <?php endif; ?>
    </div>
</body>
</html>
