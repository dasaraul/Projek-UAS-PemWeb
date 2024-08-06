<?php
session_start(); // Memulai sesi PHP
require_once("bwatkonek.php"); // Menyertakan file koneksi ke database

// Ambil data kategori dari database
$kategoriResult = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY kategori_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kategori</title>
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
        <h1>Daftar Kategori</h1>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="add_kategori.php">Tambah Kategori</a>
        <?php endif; ?>

        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($kategoriResult)) {
                echo "<tr>";
                echo "<td>".$res['kategori_id']."</td>"; // Menampilkan ID kategori
                echo "<td>".$res['nama_kategori']."</td>"; // Menampilkan nama kategori
                echo "<td>".$res['deskripsi']."</td>"; // Menampilkan deskripsi
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_kategori.php?id=".$res['kategori_id']."'>Edit</a> | <a href='delete_kategori.php?id=".$res['kategori_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
