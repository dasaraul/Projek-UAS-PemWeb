#!/bin/bash

# Navigasi ke direktori proyek
cd C:\xampp\htdocs\uas-pemweb

# Perbarui list_pelanggan.php
cat <<EOL > list_pelanggan.php
<?php
session_start();
require_once("bwatkonek.php");

// Ambil data pelanggan
\$customersResult = mysqli_query(\$mysqli, "SELECT * FROM customers ORDER BY customer_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>List Pelanggan</h2>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="add_pelanggan.php">Tambah Pelanggan</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <?php if (isset(\$_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while (\$res = mysqli_fetch_assoc(\$customersResult)) {
                echo "<tr>";
                echo "<td>".\$res['first_name']."</td>";
                echo "<td>".\$res['last_name']."</td>";
                echo "<td>".\$res['email']."</td>";
                echo "<td>".\$res['phone_number']."</td>";
                if (isset(\$_SESSION['loggedin'])) {
                    echo "<td><a href='edit_pelanggan.php?id=".\$res['customer_id']."'>Edit</a> | <a href='delete_pelanggan.php?id=".\$res['customer_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
EOL

# Perbarui list_order.php
cat <<EOL > list_order.php
<?php
session_start();
require_once("bwatkonek.php");

// Ambil data order
\$ordersResult = mysqli_query(\$mysqli, "SELECT * FROM orders ORDER BY order_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>List Order</h2>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="add_order.php">Tambah Order</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Order Date</th>
                <th>Order Time</th>
                <th>Total Amount</th>
                <th>Status</th>
                <?php if (isset(\$_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while (\$res = mysqli_fetch_assoc(\$ordersResult)) {
                echo "<tr>";
                echo "<td>".\$res['order_date']."</td>";
                echo "<td>".\$res['order_time']."</td>";
                echo "<td>".\$res['total_amount']."</td>";
                echo "<td>".\$res['status']."</td>";
                if (isset(\$_SESSION['loggedin'])) {
                    echo "<td><a href='edit_order.php?id=".\$res['order_id']."'>Edit</a> | <a href='delete_order.php?id=".\$res['order_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
EOL

# Perbarui list_reservasi.php
cat <<EOL > list_reservasi.php
<?php
session_start();
require_once("bwatkonek.php");

// Ambil data reservasi
\$reservationsResult = mysqli_query(\$mysqli, "SELECT * FROM reservations ORDER BY reservation_id DESC");
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
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>List Reservasi</h2>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="add_reservasi.php">Tambah Reservasi</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Reservation Date</th>
                <th>Reservation Time</th>
                <th>Number of Guests</th>
                <th>Special Requests</th>
                <?php if (isset(\$_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while (\$res = mysqli_fetch_assoc(\$reservationsResult)) {
                echo "<tr>";
                echo "<td>".\$res['reservation_date']."</td>";
                echo "<td>".\$res['reservation_time']."</td>";
                echo "<td>".\$res['number_of_guests']."</td>";
                echo "<td>".\$res['special_requests']."</td>";
                if (isset(\$_SESSION['loggedin'])) {
                    echo "<td><a href='edit_reservasi.php?id=".\$res['reservation_id']."'>Edit</a> | <a href='delete_reservasi.php?id=".\$res['reservation_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
EOL

# Perbarui list_menu.php
cat <<EOL > list_menu.php
<?php
session_start();
require_once("bwatkonek.php");

// Ambil data menu
\$menuItemsResult = mysqli_query(\$mysqli, "SELECT * FROM menu_items ORDER BY menu_item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>List Menu</h2>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="add_menu.php">Tambah Menu</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Item Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Available</th>
                <?php if (isset(\$_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while (\$res = mysqli_fetch_assoc(\$menuItemsResult)) {
                echo "<tr>";
                echo "<td>".\$res['item_name']."</td>";
                echo "<td>".\$res['description']."</td>";
                echo "<td>".\$res['price']."</td>";
                echo "<td>".\$res['category']."</td>";
                echo "<td>".(\$res['available'] ? 'Yes' : 'No')."</td>";
                if (isset(\$_SESSION['loggedin'])) {
                    echo "<td><a href='edit_menu.php?id=".\$res['menu_item_id']."'>Edit</a> | <a href='delete_menu.php?id=".\$res['menu_item_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
EOL

# Perbarui dashboard.php
cat <<EOL > dashboard.php
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h1>Selamat Datang di Dashboard</h1>

        <?php if (isset(\$_SESSION['loggedin'])): ?>
            <p>Mode Admin - Anda sedang login</p>
        <?php else: ?>
            <p>Mode Pengunjung - Anda tidak login</p>
        <?php endif; ?>
    </div>
</body>
</html>
EOL

echo "Update selesai!"
