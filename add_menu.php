<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Tautkan ke file CSS -->
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
            <h1>Tambah Menu</h1> <!-- Judul halaman -->
            <form action="add_menu_action.php" method="POST"> <!-- Formulir tambah menu -->
                <table>
                    <tr>
                        <td><label for="item_name">Nama Item:</label></td>
                        <td><input type="text" id="item_name" name="item_name" required></td> <!-- Input nama item -->
                    </tr>
                    <tr>
                        <td><label for="description">Deskripsi:</label></td>
                        <td><input type="text" id="description" name="description" required></td> <!-- Input deskripsi -->
                    </tr>
                    <tr>
                        <td><label for="price">Harga:</label></td>
                        <td><input type="number" step="0.01" id="price" name="price" required></td> <!-- Input harga -->
                    </tr>
                    <tr>
                        <td><label for="category">Kategori:</label></td>
                        <td>
                            <select id="category" name="category" required>
                                <option value="">--Pilih Kategori--</option>
                                <?php
                                // Ambil data kategori dari database
                                $query = "SELECT kategori_id, nama_kategori FROM kategori";
                                $result = mysqli_query($mysqli, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['kategori_id'] . "'>" . $row['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </td> <!-- Dropdown kategori -->
                    </tr>
                    <tr>
                        <td><label for="available">Tersedia:</label></td>
                        <td><input type="text" id="available" name="available" required></td> <!-- Input ketersediaan -->
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah"></td> <!-- Tombol kirim -->
                    </tr>
                </table>
            </form>
            <a href="list_menu.php">Kembali ke Daftar Menu</a> <!-- Tautan kembali -->
        </center>
    </div>
</body>
</html>
