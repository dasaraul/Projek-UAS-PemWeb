<?php
session_start();
require_once("bwatkonek.php");

// Mengambil semua data reservasi dari database
$result = mysqli_query($mysqli, "SELECT * FROM reservations ORDER BY reservation_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Reservasi</title>
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
        <h2>Daftar Reservasi</h2>
        <table border="1">
            <tr>
                <th>ID Pelanggan</th>
                <th>Tanggal Reservasi</th>
                <th>Waktu Reservasi</th>
                <th>Jumlah Tamu</th>
                <th>Permintaan Khusus</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            // Menampilkan data reservasi dalam tabel
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['customer_id']."</td>";
                echo "<td>".$res['reservation_date']."</td>";
                echo "<td>".$res['reservation_time']."</td>";
                echo "<td>".$res['number_of_guests']."</td>";
                echo "<td>".$res['special_requests']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href=\"edit_reservasi.php?id={$res['reservation_id']}\">Edit</a> | <a href=\"delete_reservasi.php?id={$res['reservation_id']}\" onClick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
<a href="add_action.php">Tambah Reservasi</a>
</body>
</html>
