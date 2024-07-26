#!/bin/bash

# Path ke direktori proyek
PROJECT_PATH="C:/xampp/htdocs/uas-pemweb"

# Membuat direktori CSS jika belum ada
mkdir -p "$PROJECT_PATH/cssnich"

# Menambahkan CSS ke file
cat << 'EOF' > "$PROJECT_PATH/cssnich/cssnya.css"
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-weight: bold;
}

input, textarea {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
}

input[type="checkbox"] {
    width: auto;
}

input[type="submit"] {
    background-color: #5cb85c;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 1em;
    border-radius: 4px;
}

input[type="submit"]:hover {
    background-color: #4cae4c;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f4f4f4;
}

a {
    color: #337ab7;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.navbar {
    background-color: #333;
    overflow: hidden;
}

.navbar a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

.navbar .active {
    background-color: #4CAF50;
    color: white;
}
EOF

# Menambahkan file PHP baru dengan form add, edit, delete yang sudah diperbarui
# Buat file add_pelanggan.php
cat << 'EOF' > "$PROJECT_PATH/add_pelanggan.php"
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $query = "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')";
    mysqli_query($mysqli, $query);

    header("Location: list_pelanggan.php");
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
        <h1>Tambah Pelanggan</h1>
        <form method="POST" action="">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Buat file edit_pelanggan.php
cat << 'EOF' > "$PROJECT_PATH/edit_pelanggan.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $query = "UPDATE customers SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number' WHERE customer_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_pelanggan.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE customer_id=$id");
$customer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Pelanggan</h1>
        <form method="POST" action="">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo $customer['first_name']; ?>" required>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $customer['last_name']; ?>" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $customer['email']; ?>" required>
            <br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo $customer['phone_number']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Buat file delete_pelanggan.php
cat << 'EOF' > "$PROJECT_PATH/delete_pelanggan.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM customers WHERE customer_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_pelanggan.php");
?>
EOF

# Ulangi proses di atas untuk tabel reservasi, menu, order, dan item order

# Buat file add_reservasi.php
cat << 'EOF' > "$PROJECT_PATH/add_reservasi.php"
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $special_requests = $_POST['special_requests'];

    $query = "INSERT INTO reservations (reservation_date, reservation_time, number_of_guests, special_requests) VALUES ('$reservation_date', '$reservation_time', '$number_of_guests', '$special_requests')";
    mysqli_query($mysqli, $query);

    header("Location: list_reservasi.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Reservasi</h1>
        <form method="POST" action="">
            <label for="reservation_date">Reservation Date:</label>
            <input type="date" name="reservation_date" required>
            <br>

            <label for="reservation_time">Reservation Time:</label>
            <input type="time" name="reservation_time" required>
            <br>

            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" required>
            <br>

            <label for="special_requests">Special Requests:</label>
            <textarea name="special_requests"></textarea>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Buat file edit_reservasi.php
cat << 'EOF' > "$PROJECT_PATH/edit_reservasi.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $special_requests = $_POST['special_requests'];

    $query = "UPDATE reservations SET reservation_date='$reservation_date', reservation_time='$reservation_time', number_of_guests='$number_of_guests', special_requests='$special_requests' WHERE reservation_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_reservasi.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM reservations WHERE reservation_id=$id");
$reservation = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Reservasi</h1>
        <form method="POST" action="">
            <label for="reservation_date">Reservation Date:</label>
            <input type="date" name="reservation_date" value="<?php echo $reservation['reservation_date']; ?>" required>
            <br>

            <label for="reservation_time">Reservation Time:</label>
            <input type="time" name="reservation_time" value="<?php echo $reservation['reservation_time']; ?>" required>
            <br>

            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" value="<?php echo $reservation['number_of_guests']; ?>" required>
            <br>

            <label for="special_requests">Special Requests:</label>
            <textarea name="special_requests"><?php echo $reservation['special_requests']; ?></textarea>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Buat file delete_reservasi.php
cat << 'EOF' > "$PROJECT_PATH/delete_reservasi.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM reservations WHERE reservation_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_reservasi.php");
?>
EOF

# Buat file add_menu.php
cat << 'EOF' > "$PROJECT_PATH/add_menu.php"
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $available = isset($_POST['available']) ? 1 : 0;

    $query = "INSERT INTO menu_items (item_name, description, price, category, available) VALUES ('$item_name', '$description', '$price', '$category', '$available')";
    mysqli_query($mysqli, $query);

    header("Location: list_menu.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Menu</h1>
        <form method="POST" action="">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" required>
            <br>

            <label for="description">Description:</label>
            <textarea name="description"></textarea>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" required>
            <br>

            <label for="category">Category:</label>
            <input type="text" name="category" required>
            <br>

            <label for="available">Available:</label>
            <input type="checkbox" name="available">
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Buat file edit_menu.php
cat << 'EOF' > "$PROJECT_PATH/edit_menu.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $available = isset($_POST['available']) ? 1 : 0;

    $query = "UPDATE menu_items SET item_name='$item_name', description='$description', price='$price', category='$category', available='$available' WHERE menu_item_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_menu.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM menu_items WHERE menu_item_id=$id");
$menu = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Menu</h1>
        <form method="POST" action="">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" value="<?php echo $menu['item_name']; ?>" required>
            <br>

            <label for="description">Description:</label>
            <textarea name="description"><?php echo $menu['description']; ?></textarea>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo $menu['price']; ?>" required>
            <br>

            <label for="category">Category:</label>
            <input type="text" name="category" value="<?php echo $menu['category']; ?>" required>
            <br>

            <label for="available">Available:</label>
            <input type="checkbox" name="available" <?php echo $menu['available'] ? 'checked' : ''; ?>>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Buat file delete_menu.php
cat << 'EOF' > "$PROJECT_PATH/delete_menu.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM menu_items WHERE menu_item_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_menu.php");
?>
EOF

# Buat file add_order.php
cat << 'EOF' > "$PROJECT_PATH/add_order.php"
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    $query = "INSERT INTO orders (order_date, order_time, total_amount, status) VALUES ('$order_date', '$order_time', '$total_amount', '$status')";
    mysqli_query($mysqli, $query);

    header("Location: list_order.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Order</h1>
        <form method="POST" action="">
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" required>
            <br>

            <label for="order_time">Order Time:</label>
            <input type="time" name="order_time" required>
            <br>

            <label for="total_amount">Total Amount:</label>
            <input type="number" step="0.01" name="total_amount" required>
            <br>

            <label for="status">Status:</label>
            <input type="text" name="status" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Buat file edit_order.php
cat << 'EOF' > "$PROJECT_PATH/edit_order.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    $query = "UPDATE orders SET order_date='$order_date', order_time='$order_time', total_amount='$total_amount', status='$status' WHERE order_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_order.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE order_id=$id");
$order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Order</h1>
        <form method="POST" action="">
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" value="<?php echo $order['order_date']; ?>" required>
            <br>

            <label for="order_time">Order Time:</label>
            <input type="time" name="order_time" value="<?php echo $order['order_time']; ?>" required>
            <br>

            <label for="total_amount">Total Amount:</label>
            <input type="number" step="0.01" name="total_amount" value="<?php echo $order['total_amount']; ?>" required>
            <br>

            <label for="status">Status:</label>
            <input type="text" name="status" value="<?php echo $order['status']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Buat file delete_order.php
cat << 'EOF' > "$PROJECT_PATH/delete_order.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM orders WHERE order_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_order.php");
?>
EOF

# Buat file add_item_order.php
cat << 'EOF' > "$PROJECT_PATH/add_item_order.php"
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES ('$order_id', '$menu_item_id', '$quantity')";
    mysqli_query($mysqli, $query);

    header("Location: list_item_order.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Item Order</h1>
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="number" name="order_id" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="number" name="menu_item_id" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Buat file edit_item_order.php
cat << 'EOF' > "$PROJECT_PATH/edit_item_order.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE order_items SET order_id='$order_id', menu_item_id='$menu_item_id', quantity='$quantity' WHERE order_item_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_item_order.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM order_items WHERE order_item_id=$id");
$item_order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Item Order</h1>
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="number" name="order_id" value="<?php echo $item_order['order_id']; ?>" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="number" name="menu_item_id" value="<?php echo $item_order['menu_item_id']; ?>" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="<?php echo $item_order['quantity']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Buat file delete_item_order.php
cat << 'EOF' > "$PROJECT_PATH/delete_item_order.php"
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM order_items WHERE order_item_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_item_order.php");
?>
EOF

# Menset izin eksekusi untuk skrip
chmod +x "$PROJECT_PATH/update_all_with_css.sh"

echo "Skrip dan file telah berhasil dibuat dan diperbarui."
