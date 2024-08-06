<?php
require_once("bwatkonek.php");
session_start(); // Mulai session untuk cek login

// Ambil data dari setiap tabel
$customersResult = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY customer_id DESC");
$reservationsResult = mysqli_query($mysqli, "SELECT * FROM reservations ORDER BY reservation_id DESC");
$menuItemsResult = mysqli_query($mysqli, "SELECT * FROM menu_items ORDER BY menu_item_id DESC");
$ordersResult = mysqli_query($mysqli, "SELECT * FROM orders ORDER BY order_id DESC");
$orderItemsResult = mysqli_query($mysqli, "SELECT * FROM order_items ORDER BY order_item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas Kelompok UAS Pemegroaman Web R.03</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
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

    <div class="container">
        <center>
            <h1>CRUD PHP NATIVE</h1>
            <h2>Tugas UAS Pemegroaman Web R.03</h2>
            <h3>CRUD sederhana tanpa css/style lainnya berisikan tambah, edit, hapus</h3>
        </center><br><br>

        <!-- Tabel Pelanggan -->
        <h2>Daftar Pelanggan</h2>
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
        </table><br>
        

        <!-- Tabel Reservasi -->
        <h2>Daftar Reservasi</h2>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Tanggal Reservasi</th>
                <th>Waktu Reservasi</th>
                <th>Jumlah Tamu</th>
                <th>Permintaan Khusus</th>
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
                    echo "<td><a href='edit_reservasi.php?id=".$res['reservation_id']."'>Edit</a> | <a href='delete_reservasi.php?id=".$res['reservation_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table><br>

        <!-- Tabel Menu -->
        <h2>Daftar Menu</h2>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Nama Item</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Tersedia</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($menuItemsResult)) {
                echo "<tr>";
                echo "<td>".$res['item_name']."</td>";
                echo "<td>".$res['description']."</td>";
                echo "<td>".$res['price']."</td>";
                echo "<td>".$res['category']."</td>";
                echo "<td>".($res['available'] ? 'Ya' : 'Tidak')."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_menu.php?id=".$res['menu_item_id']."'>Edit</a> | <a href='delete_menu.php?id=".$res['menu_item_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table><br>

        <!-- Tabel Order -->
        <h2>Daftar Order</h2>
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
        </table><br>

        <!-- Tabel Item Order -->
        <h2>Daftar Item Order</h2>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>ID Order</th>
                <th>ID Menu Item</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($orderItemsResult)) {
                echo "<tr>";
                echo "<td>".$res['order_id']."</td>";
                echo "<td>".$res['menu_item_id']."</td>";
                echo "<td>".$res['quantity']."</td>";
                echo "<td>".$res['price']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_order_item.php?id=".$res['order_item_id']."'>Edit</a> | <a href='delete_order_item.php?id=".$res['order_item_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table><br>
    </div>
</body>
</html>
