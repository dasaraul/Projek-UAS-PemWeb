<?php
session_start();
require_once("bwatkonek.php");

// Ambil data pelanggan
$customersResult = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY customer_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Beranda</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Keluar</a>
        <?php else: ?>
            <a href="login.php">Masuk</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>Daftar Pelanggan</h2>
        <a href="add_pelanggan.php">Tambah Pelanggan</a>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($customersResult)) {
                echo "<tr>";
                echo "<td>".$res['first_name']."</td>";
                echo "<td>".$res['last_name']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['phone_number']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_pelanggan.php?id=".$res['customer_id']."'>Edit</a> | <a href='delete_pelanggan.php?id=".$res['customer_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
