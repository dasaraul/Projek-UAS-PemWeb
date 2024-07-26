<?php
session_start();
require_once("bwatkonek.php");

// Ambil data reservasi
$reservationsResult = mysqli_query($mysqli, "SELECT * FROM reservations ORDER BY reservation_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>List Reservasi</h2>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="add_reservasi.php">Tambah Reservasi</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Reservation Date</th>
                <th>Reservation Time</th>
                <th>Number of Guests</th>
                <th>Special Requests</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($reservationsResult)) {
                echo "<tr>";
                echo "<td>".$res['reservation_date']."</td>";
                echo "<td>".$res['reservation_time']."</td>";
                echo "<td>".$res['number_of_guests']."</td>";
                echo "<td>".$res['special_requests']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_reservasi.php?id=".$res['reservation_id']."'>Edit</a> | <a href='delete_reservasi.php?id=".$res['reservation_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
