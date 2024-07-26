#!/bin/bash

# Set working directory to project path
PROJECT_PATH="/c/xampp/htdocs/uas-pemweb"
cd "$PROJECT_PATH" || exit

# Create add_pelanggan.php
cat << 'EOF' > add_pelanggan.php
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Query untuk menambah data pelanggan
    $query = "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')";
    mysqli_query($mysqli, $query);

    header("Location: list_pelanggan.php"); // Arahkan ke halaman daftar pelanggan setelah berhasil
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
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

# Create edit_pelanggan.php
cat << 'EOF' > edit_pelanggan.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Query untuk memperbarui data pelanggan
    $query = "UPDATE customers SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number' WHERE customer_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_pelanggan.php"); // Arahkan ke halaman daftar pelanggan setelah berhasil
}

// Ambil data pelanggan berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE customer_id=$id");
$customer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
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

# Create delete_pelanggan.php
cat << 'EOF' > delete_pelanggan.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data pelanggan
$query = "DELETE FROM customers WHERE customer_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_pelanggan.php"); // Arahkan ke halaman daftar pelanggan setelah berhasil
?>
EOF

# Create add_order.php
cat << 'EOF' > add_order.php
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    // Query untuk menambah data order
    $query = "INSERT INTO orders (order_date, order_time, total_amount, status) VALUES ('$order_date', '$order_time', '$total_amount', '$status')";
    mysqli_query($mysqli, $query);

    header("Location: list_order.php"); // Arahkan ke halaman daftar order setelah berhasil
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
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

# Create edit_order.php
cat << 'EOF' > edit_order.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    // Query untuk memperbarui data order
    $query = "UPDATE orders SET order_date='$order_date', order_time='$order_time', total_amount='$total_amount', status='$status' WHERE order_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_order.php"); // Arahkan ke halaman daftar order setelah berhasil
}

// Ambil data order berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE order_id=$id");
$order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
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

# Create delete_order.php
cat << 'EOF' > delete_order.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data order
$query = "DELETE FROM orders WHERE order_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_order.php"); // Arahkan ke halaman daftar order setelah berhasil
?>
EOF

# Create add_reservasi.php
cat << 'EOF' > add_reservasi.php
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $special_requests = $_POST['special_requests'];

    // Query untuk menambah data reservasi
    $query = "INSERT INTO reservations (reservation_date, reservation_time, number_of_guests, special_requests) VALUES ('$reservation_date', '$reservation_time', '$number_of_guests', '$special_requests')";
    mysqli_query($mysqli, $query);

    header("Location: list_reservasi.php"); // Arahkan ke halaman daftar reservasi setelah berhasil
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
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
            <textarea name="special_requests" required></textarea>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Create edit_reservasi.php
cat << 'EOF' > edit_reservasi.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $special_requests = $_POST['special_requests'];

    // Query untuk memperbarui data reservasi
    $query = "UPDATE reservations SET reservation_date='$reservation_date', reservation_time='$reservation_time', number_of_guests='$number_of_guests', special_requests='$special_requests' WHERE reservation_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_reservasi.php"); // Arahkan ke halaman daftar reservasi setelah berhasil
}

// Ambil data reservasi berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM reservations WHERE reservation_id=$id");
$reservation = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
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
            <textarea name="special_requests" required><?php echo $reservation['special_requests']; ?></textarea>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Create delete_reservasi.php
cat << 'EOF' > delete_reservasi.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data reservasi
$query = "DELETE FROM reservations WHERE reservation_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_reservasi.php"); // Arahkan ke halaman daftar reservasi setelah berhasil
?>
EOF

# Create add_menu.php
cat << 'EOF' > add_menu.php
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $available = isset($_POST['available']) ? 1 : 0;

    // Query untuk menambah data menu
    $query = "INSERT INTO menu_items (item_name, description, price, category, available) VALUES ('$item_name', '$description', '$price', '$category', '$available')";
    mysqli_query($mysqli, $query);

    header("Location: list_menu.php"); // Arahkan ke halaman daftar menu setelah berhasil
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Tambah Menu</h1>
        <form method="POST" action="">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" required>
            <br>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" required>
            <br>

            <label for="category">Category:</label>
            <input type="text" name="category" required>
            <br>

            <label for="available">Available:</label>
            <input type="checkbox" name="available" value="1">
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Create edit_menu.php
cat << 'EOF' > edit_menu.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $available = isset($_POST['available']) ? 1 : 0;

    // Query untuk memperbarui data menu
    $query = "UPDATE menu_items SET item_name='$item_name', description='$description', price='$price', category='$category', available='$available' WHERE menu_item_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_menu.php"); // Arahkan ke halaman daftar menu setelah berhasil
}

// Ambil data menu berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM menu_items WHERE menu_item_id=$id");
$menu = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Edit Menu</h1>
        <form method="POST" action="">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" value="<?php echo $menu['item_name']; ?>" required>
            <br>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo $menu['description']; ?></textarea>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo $menu['price']; ?>" required>
            <br>

            <label for="category">Category:</label>
            <input type="text" name="category" value="<?php echo $menu['category']; ?>" required>
            <br>

            <label for="available">Available:</label>
            <input type="checkbox" name="available" value="1" <?php echo $menu['available'] ? 'checked' : ''; ?>>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Create delete_menu.php
cat << 'EOF' > delete_menu.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data menu
$query = "DELETE FROM menu_items WHERE menu_item_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_menu.php"); // Arahkan ke halaman daftar menu setelah berhasil
?>
EOF

# Create add_order_item.php
cat << 'EOF' > add_order_item.php
<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Query untuk menambah data item order
    $query = "INSERT INTO order_items (order_id, menu_item_id, quantity, price) VALUES ('$order_id', '$menu_item_id', '$quantity', '$price')";
    mysqli_query($mysqli, $query);

    header("Location: list_order_item.php"); // Arahkan ke halaman daftar item order setelah berhasil
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Tambah Item Order</h1>
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="text" name="order_id" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="text" name="menu_item_id" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
EOF

# Create edit_order_item.php
cat << 'EOF' > edit_order_item.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Query untuk memperbarui data item order
    $query = "UPDATE order_items SET order_id='$order_id', menu_item_id='$menu_item_id', quantity='$quantity', price='$price' WHERE order_item_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_order_item.php"); // Arahkan ke halaman daftar item order setelah berhasil
}

// Ambil data item order berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM order_items WHERE order_item_id=$id");
$order_item = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Edit Item Order</h1>
        <form method="POST" action="">
            <label for="order_id">Order ID:</label>
            <input type="text" name="order_id" value="<?php echo $order_item['order_id']; ?>" required>
            <br>

            <label for="menu_item_id">Menu Item ID:</label>
            <input type="text" name="menu_item_id" value="<?php echo $order_item['menu_item_id']; ?>" required>
            <br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="<?php echo $order_item['quantity']; ?>" required>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo $order_item['price']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
EOF

# Create delete_order_item.php
cat << 'EOF' > delete_order_item.php
<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data item order
$query = "DELETE FROM order_items WHERE order_item_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_order_item.php"); // Arahkan ke halaman daftar item order setelah berhasil
?>
EOF
