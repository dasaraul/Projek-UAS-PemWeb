<?php
session_start();
require_once("bwatkonek.php");

// Fungsi untuk menambah data ke tabel pelanggan
if (isset($_POST['add_customer'])) {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

    mysqli_query($mysqli, "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')");
    header("Location: list_pelanggan.php");
}

// Fungsi untuk menambah data ke tabel order
if (isset($_POST['add_order'])) {
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);
    $order_date = mysqli_real_escape_string($mysqli, $_POST['order_date']);
    $order_time = mysqli_real_escape_string($mysqli, $_POST['order_time']);
    $total_amount = mysqli_real_escape_string($mysqli, $_POST['total_amount']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    mysqli_query($mysqli, "INSERT INTO orders (customer_id, order_date, order_time, total_amount, status) VALUES ('$customer_id', '$order_date', '$order_time', '$total_amount', '$status')");
    header("Location: list_order.php");
}

// Fungsi untuk menambah data ke tabel reservasi
if (isset($_POST['add_reservation'])) {
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);
    $reservation_date = mysqli_real_escape_string($mysqli, $_POST['reservation_date']);
    $reservation_time = mysqli_real_escape_string($mysqli, $_POST['reservation_time']);
    $number_of_guests = mysqli_real_escape_string($mysqli, $_POST['number_of_guests']);
    $special_requests = mysqli_real_escape_string($mysqli, $_POST['special_requests']);

    mysqli_query($mysqli, "INSERT INTO reservations (customer_id, reservation_date, reservation_time, number_of_guests, special_requests) VALUES ('$customer_id', '$reservation_date', '$reservation_time', '$number_of_guests', '$special_requests')");
    header("Location: list_reservasi.php");
}

// Fungsi untuk menambah data ke tabel menu
if (isset($_POST['add_menu_item'])) {
    $item_name = mysqli_real_escape_string($mysqli, $_POST['item_name']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);
    $available = mysqli_real_escape_string($mysqli, $_POST['available']);

    mysqli_query($mysqli, "INSERT INTO menu_items (item_name, description, price, category, available) VALUES ('$item_name', '$description', '$price', '$category', '$available')");
    header("Location: list_menu.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data</h1>

        <!-- Form Tambah Pelanggan -->
        <h2>Tambah Pelanggan</h2>
        <form method="post" action="add_action.php">
            <input type="hidden" name="add_customer">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone_number" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah Pelanggan"></td>
                </tr>
            </table>
        </form>

        <!-- Form Tambah Order -->
        <h2>Tambah Order</h2>
        <form method="post" action="add_action.php">
            <input type="hidden" name="add_order">
            <table>
                <tr>
                    <td>Customer ID:</td>
                    <td><input type="number" name="customer_id" required></td>
                </tr>
                <tr>
                    <td>Order Date:</td>
                    <td><input type="date" name="order_date" required></td>
                </tr>
                <tr>
                    <td>Order Time:</td>
                    <td><input type="time" name="order_time" required></td>
                </tr>
                <tr>
                    <td>Total Amount:</td>
                    <td><input type="number" step="0.01" name="total_amount" required></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><input type="text" name="status" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah Order"></td>
                </tr>
            </table>
        </form>

        <!-- Form Tambah Reservasi -->
        <h2>Tambah Reservasi</h2>
        <form method="post" action="add_action.php">
            <input type="hidden" name="add_reservation">
            <table>
                <tr>
                    <td>Customer ID:</td>
                    <td><input type="number" name="customer_id" required></td>
                </tr>
                <tr>
                    <td>Reservation Date:</td>
                    <td><input type="date" name="reservation_date" required></td>
                </tr>
                <tr>
                    <td>Reservation Time:</td>
                    <td><input type="time" name="reservation_time" required></td>
                </tr>
                <tr>
                    <td>Number of Guests:</td>
                    <td><input type="number" name="number_of_guests" required></td>
                </tr>
                <tr>
                    <td>Special Requests:</td>
                    <td><textarea name="special_requests"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah Reservasi"></td>
                </tr>
            </table>
        </form>

        <!-- Form Tambah Menu -->
        <h2>Tambah Menu</h2>
        <form method="post" action="add_action.php">
            <input type="hidden" name="add_menu_item">
            <table>
                <tr>
                    <td>Item Name:</td>
                    <td><input type="text" name="item_name" required></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" required></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" step="0.01" name="price" required></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><input type="text" name="category" required></td>
                </tr>
                <tr>
                    <td>Available:</td>
                    <td>
                        <select name="available">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah Menu"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
