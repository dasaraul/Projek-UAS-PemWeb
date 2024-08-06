<!-- add_pelanggan.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
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
            <h1>Tambah Pelanggan</h1> <!-- Judul halaman -->
            <form action="add_pelanggan_action.php" method="POST"> <!-- Formulir tambah pelanggan -->
                <table>
                    <tr>
                        <td><label for="first_name">Nama Depan:</label></td>
                        <td><input type="text" id="first_name" name="first_name" required></td> <!-- Input nama depan -->
                    </tr>
                    <tr>
                        <td><label for="last_name">Nama Belakang:</label></td>
                        <td><input type="text" id="last_name" name="last_name" required></td> <!-- Input nama belakang -->
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email" required></td> <!-- Input email -->
                    </tr>
                    <tr>
                        <td><label for="phone_number">Nomor Telepon:</label></td>
                        <td><input type="text" id="phone_number" name="phone_number" required></td> <!-- Input nomor telepon -->
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah"></td> <!-- Tombol kirim -->
                    </tr>
                </table>
            </form>
            <a href="list_pelanggan.php">Kembali ke Daftar Pelanggan</a> <!-- Tautan kembali -->
        </center>
    </div>
</body>
</html>
