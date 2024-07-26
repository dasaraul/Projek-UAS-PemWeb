<?php
session_start();
require_once("bwatkonek.php");

// Ambil data order
$ordersResult = mysqli_query($mysqli, "SELECT * FROM orders ORDER BY order_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Beranda</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Keluar</a>
        <?php else: ?>
            <a href="login.php">Masuk</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>Daftar Order</h2>
        <a href="add_order.php">Tambah Order</a>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Tanggal Order</th>
                <th>Waktu Order</th>
                <th>Total Jumlah</th>
                <th>Status</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($ordersResult)) {
                echo "<tr>";
                echo "<td>".$res['order_date']."</td>";
                echo "<td>".$res['order_time']."</td>";
                echo "<td>".$res['total_amount']."</td>";
                echo "<td>".$res['status']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_order.php?id=".$res['order_id']."'>Edit</a> | <a href='delete_order.php?id=".$res['order_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
