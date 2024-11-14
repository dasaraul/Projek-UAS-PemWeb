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

        <!-- Tampilkan tabel untuk setiap entitas -->
        <?php
        function displayTable($title, $result, $fields, $actions = true) {
            echo "<h2>$title</h2>";
            echo "<table width='100%' border=0>";
            echo "<tr bgcolor='#DDDDDD'>";
            foreach ($fields as $field) {
                echo "<th>$field</th>";
            }
            if (isset($_SESSION['loggedin']) && $actions) {
                echo "<th>Aksi</th>";
            }
            echo "</tr>";

            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($fields as $field) {
                    echo "<td>".$res[$field]."</td>";
                }
                if (isset($_SESSION['loggedin']) && $actions) {
                    $id = $res[array_key_first($res)];
                    echo "<td><a href='edit_".strtolower($title)."?id=$id'>Edit</a> | <a href='delete_".strtolower($title)."?id=$id' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            echo "</table><br>";
        }

        $customerFields = ['first_name', 'last_name', 'email', 'phone_number'];
        displayTable("Daftar Pelanggan", $customersResult, $customerFields);

        $reservationFields = ['reservation_date', 'reservation_time', 'number_of_guests', 'special_requests'];
        displayTable("Daftar Reservasi", $reservationsResult, $reservationFields);

        $menuItemFields = ['item_name', 'description', 'price', 'category', 'available'];
        displayTable("Daftar Menu", $menuItemsResult, $menuItemFields);

        $orderFields = ['order_date', 'order_time', 'total_amount', 'status'];
        displayTable("Daftar Order", $ordersResult, $orderFields);

        $orderItemFields = ['order_id', 'menu_item_id', 'quantity', 'price'];
        displayTable("Daftar Item Order", $orderItemsResult, $orderItemFields);
        ?>
    </div>
</body>
</html>
