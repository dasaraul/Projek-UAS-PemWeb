<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Beranda</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <a href="list_order_item.php">Order Item</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Keluar</a>
        <?php else: ?>
            <a href="login.php">Masuk</a>
        <?php endif; ?>
    </div>
    <div class="container"> <!-- Kontainer utama -->
        <center>
            <h1>Tambah Order</h1> <!-- Judul halaman -->
            <form action="add_order_action.php" method="POST"> <!-- Formulir tambah order -->
                <table>
                    <tr>
                        <td><label for="customer_id">Customer:</label></td>
                        <td>
                            <select id="customer_id" name="customer_id" required>
                                <option value="">--Pilih Customer--</option>
                                <?php
                                // Ambil data customer dari database
                                $query = "SELECT customer_id, first_name, last_name FROM customers";
                                $result = mysqli_query($mysqli, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['customer_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="order_date">Tanggal Order:</label></td>
                        <td><input type="date" id="order_date" name="order_date" required></td> <!-- Input tanggal order -->
                    </tr>
                    <tr>
                        <td><label for="order_time">Waktu Order:</label></td>
                        <td><input type="time" id="order_time" name="order_time" required></td> <!-- Input waktu order -->
                    </tr>
                    <tr>
                        <td><label for="total_amount">Jumlah Total:</label></td>
                        <td><input type="number" step="0.01" id="total_amount" name="total_amount" required></td> <!-- Input jumlah total -->
                    </tr>
                    <tr>
                        <td><label for="status">Status:</label></td>
                        <td>
                            <select id="status" name="status" required>
                                <option value="">--Pilih Status--</option>
                                <?php
                                // Ambil data kategori dari database untuk status
                                $query = "SELECT kategori_id, nama_kategori FROM kategori";
                                $result = mysqli_query($mysqli, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['kategori_id'] . "'>" . $row['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </td> <!-- Dropdown status -->
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah"></td> <!-- Tombol kirim -->
                    </tr>
                </table>
            </form>
            <a href="list_order.php">Kembali ke Daftar Order</a> <!-- Tautan kembali -->
        </center>
    </div>
</body>
</html>
