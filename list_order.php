<?php
session_start();
require_once("bwatkonek.php");

// Mengambil semua data order dari database
$result = mysqli_query($mysqli, "SELECT * FROM orders ORDER BY order_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Order</title>
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
        <h2>Daftar Order</h2>
        <table border="1">
            <tr>
                <th>ID Pelanggan</th>
                <th>Tanggal Order</th>
                <th>Waktu Order</th>
                <th>Total Amount</th>
                <th>Status</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            // Menampilkan data order dalam tabel
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['customer_id']."</td>";
                echo "<td>".$res['order_date']."</td>";
                echo "<td>".$res['order_time']."</td>";
                echo "<td>".$res['total_amount']."</td>";
                echo "<td>".$res['status']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href=\"edit_order.php?id={$res['order_id']}\">Edit</a> | <a href=\"delete_order.php?id={$res['order_id']}\" onClick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
