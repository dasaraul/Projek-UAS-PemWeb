#!/bin/bash

# Lokasi direktori proyek Anda
PROJECT_DIR="C:\xampp\htdocs\uas-pemweb"

# Navigasi ke direktori proyek
cd "$PROJECT_DIR" || { echo "Directory not found: $PROJECT_DIR"; exit 1; }

# Backup file lama
echo "Backing up existing files..."
tar -czf backup_$(date +%F_%T).tar.gz *.php cssnich/

# Update index.php
echo "Updating index.php..."
cat <<EOL > index.php
<?php
require_once("bwatkonek.php");
require_once("layout/nav.php");

// Ambil data dari setiap tabel
$customersResult = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY customer_id DESC");
$reservationsResult = mysqli_query($mysqli, "SELECT * FROM reservations ORDER BY reservation_id DESC");
$menuItemsResult = mysqli_query($mysqli, "SELECT * FROM menu_items ORDER BY menu_item_id DESC");
$ordersResult = mysqli_query($mysqli, "SELECT * FROM orders ORDER BY order_id DESC");
$orderItemsResult = mysqli_query($mysqli, "SELECT * FROM order_items ORDER BY order_item_id DESC");
?>

<html>
<head>
    <title>Tugas Kelompok UAS Pemegroaman Web R.03</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>

<body>

    <div class="container">
        <center><h1>CRUD PHP NATIVE</h1>
        <h2>Tugas UAS Pemegroaman Web R.03</h2>
        <h3>CRUD sederhana tanpa css/style lainnya berisikan add, edit, delete</h3></center>

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
EOL

# Update dashboard.php
echo "Updating dashboard.php..."
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
            <a href="add_pelanggan.php">Tambah Pelanggan</a> |
            <a href="add_order.php">Tambah Order</a> |
            <a href="add_reservasi.php">Tambah Reservasi</a> |
            <a href="add_menu.php">Tambah Menu</a>
        <?php else: ?>
            <p>Mode Pengunjung - Anda tidak login</p>
        <?php endif; ?>
    </div>
</body>
</html>
EOL

# Create other required files
echo "Creating add_pelanggan.php..."
cat <<EOL > add_pelanggan.php
<?php
session_start();
require_once("bwatkonek.php");

if (isset(\$_POST['submit'])) {
    \$first_name = mysqli_real_escape_string(\$mysqli, \$_POST['first_name']);
    \$last_name = mysqli_real_escape_string(\$mysqli, \$_POST['last_name']);
    \$email = mysqli_real_escape_string(\$mysqli, \$_POST['email']);
    \$phone_number = mysqli_real_escape_string(\$mysqli, \$_POST['phone_number']);

    if (empty(\$first_name) || empty(\$last_name) || empty(\$email) || empty(\$phone_number)) {
        echo "<font color='red'>Semua field harus diisi.</font><br/>";
        echo "<a href='javascript:self.history.back();'>Kembali</a>";
    } else {
        \$result = mysqli_query(\$mysqli, "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('\$first_name', '\$last_name', '\$email', '\$phone_number')");
        echo "<p><font color='green'>Data berhasil ditambahkan!</font></p>";
        echo "<a href='list_pelanggan.php'>Lihat Daftar Pelanggan</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Pelanggan</h2>
        <form action="add_pelanggan.php" method="post">
            <table border="0">
                <tr> 
                    <td>First Name</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr> 
                    <td>Last Name</td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr> 
                    <td>Phone Number</td>
                    <td><input type="text" name="phone_number" required></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
EOL

# Create edit_pelanggan.php
echo "Creating edit_pelanggan.php..."
cat <<EOL > edit_pelanggan.php
<?php
session_start();
require_once("bwatkonek.php");

$id = \$_GET['id'];
\$result = mysqli_query(\$mysqli, "SELECT * FROM customers WHERE customer_id=\$id");
\$res = mysqli_fetch_assoc(\$result);

if (isset(\$_POST['update'])) {
    \$first_name = mysqli_real_escape_string(\$mysqli, \$_POST['first_name']);
    \$last_name = mysqli_real_escape_string(\$mysqli, \$_POST['last_name']);
    \$email = mysqli_real_escape_string(\$mysqli, \$_POST['email']);
    \$phone_number = mysqli_real_escape_string(\$mysqli, \$_POST['phone_number']);

    if (empty(\$first_name) || empty(\$last_name) || empty(\$email) || empty(\$phone_number)) {
        echo "<font color='red'>Semua field harus diisi.</font><br/>";
        echo "<a href='javascript:self.history.back();'>Kembali</a>";
    } else {
        \$result = mysqli_query(\$mysqli, "UPDATE customers SET first_name='\$first_name', last_name='\$last_name', email='\$email', phone_number='\$phone_number' WHERE customer_id=\$id");
        echo "<p><font color='green'>Data berhasil diupdate!</font></p>";
        echo "<a href='list_pelanggan.php'>Lihat Daftar Pelanggan</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h2>Edit Pelanggan</h2>
        <form action="edit_pelanggan.php?id=<?php echo \$id; ?>" method="post">
            <table border="0">
                <tr> 
                    <td>First Name</td>
                    <td><input type="text" name="first_name" value="<?php echo \$res['first_name']; ?>" required></td>
                </tr>
                <tr> 
                    <td>Last Name</td>
                    <td><input type="text" name="last_name" value="<?php echo \$res['last_name']; ?>" required></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo \$res['email']; ?>" required></td>
                </tr>
                <tr> 
                    <td>Phone Number</td>
                    <td><input type="text" name="phone_number" value="<?php echo \$res['phone_number']; ?>" required></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
EOL

# Create delete_pelanggan.php
echo "Creating delete_pelanggan.php..."
cat <<EOL > delete_pelanggan.php
<?php
session_start();
require_once("bwatkonek.php");

\$id = \$_GET['id'];
\$result = mysqli_query(\$mysqli, "DELETE FROM customers WHERE customer_id=\$id");

header("Location: list_pelanggan.php");
?>
EOL

# Repeat similar steps for other CRUD operations like orders, reservations, menu, and order_items

echo "Update completed!"
