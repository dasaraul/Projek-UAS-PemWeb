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
    <title>Tambah Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar"> <!-- Menu navigasi -->
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
    <div class="container"> <!-- Kontainer utama -->
        <center>
            <h1>Tambah Item Order</h1> <!-- Judul halaman -->
            <form method="POST" action=""> <!-- Formulir tambah item order -->
                <table>
                    <tr>
                        <td><label for="order_id">Order ID:</label></td>
                        <td>
                            <select id="order_id" name="order_id" required>
                                <?php
                                $ordersResult = mysqli_query($mysqli, "SELECT order_id FROM orders");
                                while ($order = mysqli_fetch_assoc($ordersResult)) {
                                    echo "<option value='".$order['order_id']."'>".$order['order_id']."</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="menu_item_id">Menu Item ID:</label></td>
                        <td>
                            <select id="menu_item_id" name="menu_item_id" required>
                                <?php
                                $menuItemsResult = mysqli_query($mysqli, "SELECT menu_item_id FROM menu_items");
                                while ($menuItem = mysqli_fetch_assoc($menuItemsResult)) {
                                    echo "<option value='".$menuItem['menu_item_id']."'>".$menuItem['menu_item_id']."</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Quantity:</label></td>
                        <td><input type="number" name="quantity" required></td> <!-- Input quantity -->
                    </tr>
                    <tr>
                        <td><label for="price">Price:</label></td>
                        <td><input type="number" step="0.01" name="price" required></td> <!-- Input price -->
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Tambah"></td> <!-- Tombol kirim -->
                    </tr>
                </table>
            </form>
            <a href="list_order_item.php">Kembali ke Daftar Item Order</a> <!-- Tautan kembali -->
        </center>
    </div>
</body>
</html>
