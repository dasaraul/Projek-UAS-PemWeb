<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Reservasi</title>
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

    <div class="container"> <!-- Kontainer utama -->
        <center>
            <h1>Tambah Reservasi</h1> <!-- Judul halaman -->
            <form action="add_reservasi_action.php" method="POST"> <!-- Formulir tambah reservasi -->
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
                        <td><label for="reservation_date">Tanggal Reservasi:</label></td>
                        <td><input type="date" id="reservation_date" name="reservation_date" required></td> <!-- Input tanggal reservasi -->
                    </tr>
                    <tr>
                        <td><label for="reservation_time">Waktu Reservasi:</label></td>
                        <td><input type="time" id="reservation_time" name="reservation_time" required></td> <!-- Input waktu reservasi -->
                    </tr>
                    <tr>
                        <td><label for="number_of_guests">Jumlah Orang:</label></td>
                        <td><input type="number" id="number_of_guests" name="number_of_guests" required></td> <!-- Input jumlah orang -->
                    </tr>
                    <tr>
                        <td><label for="special_requests">Permintaan Khusus:</label></td>
                        <td><input type="text" id="special_requests" name="special_requests"></td> <!-- Input permintaan khusus -->
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah"></td> <!-- Tombol kirim -->
                    </tr>
                </table>
            </form>
            <a href="list_reservasi.php">Kembali ke Daftar Reservasi</a> <!-- Tautan kembali -->
        </center>
    </div>
</body>
</html>
