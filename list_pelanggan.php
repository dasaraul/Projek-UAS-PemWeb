<?php
session_start();
require_once("bwatkonek.php");

// Mengambil semua data pelanggan dari database
$result = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY customer_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>Daftar Pelanggan</h2>
        <table border="1">
            <tr>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            // Menampilkan data pelanggan dalam tabel
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['first_name']."</td>";
                echo "<td>".$res['last_name']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['phone_number']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href=\"edit_pelanggan.php?id={$res['customer_id']}\">Edit</a> | <a href=\"delete_pelanggan.php?id={$res['customer_id']}\" onClick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
