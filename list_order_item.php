<?php
session_start(); // Memulai sesi PHP agar bisa menggunakan variabel sesi
require_once("bwatkonek.php"); // Menyertakan file koneksi ke database

// Ambil data item order dari database dan urutkan berdasarkan order_item_id secara menurun
$orderItemsResult = mysqli_query($mysqli, "SELECT * FROM order_items ORDER BY order_item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Memasukkan stylesheet untuk styling halaman -->
</head>
<body>
    <div class="navbar"> <!-- Menampilkan menu navigasi -->
        <a href="index.php">Beranda</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <a href="list_order_item.php">Item Order</a>
        <a href="list_kategori.php">Kategori</a>
        <?php if (isset($_SESSION['loggedin'])): ?> <!-- Mengecek apakah user sudah login -->
            <a href="logout.php">Keluar</a> <!-- Jika sudah login, tampilkan opsi logout -->
        <?php else: ?>
            <a href="login.php">Masuk</a> <!-- Jika belum login, tampilkan opsi login -->
        <?php endif; ?>
    </div>

    <div class="container"> <!-- Membungkus konten utama -->
        <h1>Daftar Item Order</h1>
        <?php if (isset($_SESSION['loggedin'])): ?> <!-- Mengecek apakah user sudah login untuk menampilkan opsi tambah item -->
            <a href="add_order_item.php">Tambah Item Order</a>
        <?php endif; ?>

        <table width='100%' border=0> <!-- Menampilkan tabel daftar item order -->
            <tr bgcolor='#DDDDDD'> <!-- Header tabel dengan warna background -->
                <th>Order ID</th>
                <th>Menu Item ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <?php if (isset($_SESSION['loggedin'])): ?> <!-- Tambahkan kolom aksi jika user sudah login -->
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($orderItemsResult)) { // Looping untuk menampilkan setiap baris hasil dari query
                echo "<tr>";
                echo "<td>".$res['order_id']."</td>"; // Menampilkan order ID
                echo "<td>".$res['menu_item_id']."</td>"; // Menampilkan menu item ID
                echo "<td>".$res['quantity']."</td>"; // Menampilkan jumlah item
                echo "<td>".$res['price']."</td>"; // Menampilkan harga
                if (isset($_SESSION['loggedin'])) { // Jika user sudah login, tampilkan aksi edit dan hapus
                    echo "<td><a href='edit_order_item.php?id=".$res['order_item_id']."'>Edit</a> | <a href='delete_order_item.php?id=".$res['order_item_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
