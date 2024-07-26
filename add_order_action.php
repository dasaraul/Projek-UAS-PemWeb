<?php
session_start();
require_once("bwatkonek.php");

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Mengecek apakah data dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);
    $order_date = mysqli_real_escape_string($mysqli, $_POST['order_date']);
    $order_time = mysqli_real_escape_string($mysqli, $_POST['order_time']);
    $total_amount = mysqli_real_escape_string($mysqli, $_POST['total_amount']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    // Menambahkan data order ke database
    $query = "INSERT INTO orders (customer_id, order_date, order_time, total_amount, status) VALUES ('$customer_id', '$order_date', '$order_time', '$total_amount', '$status')";
    if (mysqli_query($mysqli, $query)) {
        echo "Order berhasil ditambahkan! <a href='list_order.php'>Lihat Daftar Order</a>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
