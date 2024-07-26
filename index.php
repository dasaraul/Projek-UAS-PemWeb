<?php
require_once("bwatkonek.php");
require_once("layout/nav.php");
session_start(); // Pastikan session dimulai untuk cek login

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
        <a href="index.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <center>
            <h1>CRUD PHP NATIVE</h1>
            <h2>Tugas UAS Pemegroaman Web R.03</h2>
            <h3>CRUD sederhana tanpa css/style lainnya berisikan add, edit, delete</h3>
        </center>

        <!-- Tabel Pelanggan -->
        <h2>List Pelanggan</h2>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
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
                    echo "<td><a href='edit_pelanggan.php?id=".$res['customer_id']."'>Edit</a> | <a href='delete_pelanggan.php?id=".$res['customer_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Tabel Reservasi -->
        <h2>List Reservasi</h2>
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

        <!-- Tabel Menu -->
        <h2>List Menu</h2>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Item Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Available</th>
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
                echo "<td>".($res['available'] ? 'Yes' : 'No')."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_menu.php?id=".$res['menu_item_id']."'>Edit</a> | <a href='delete_menu.php?id=".$res['menu_item_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Tabel Order -->
        <h2>List Order</h2>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Order Date</th>
                <th>Order Time</th>
                <th>Total Amount</th>
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
                    echo "<td><a href='edit_order.php?id=".$res['order_id']."'>Edit</a> | <a href='delete_order.php?id=".$res['order_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Tabel Item Order -->
        <h2>List Item Order</h2>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Order ID</th>
                <th>Menu Item ID</th>
                <th>Quantity</th>
                <th>Price</th>
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
                    echo "<td><a href='edit_order_item.php?id=".$res['order_item_id']."'>Edit</a> | <a href='delete_order_item.php?id=".$res['order_item_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
