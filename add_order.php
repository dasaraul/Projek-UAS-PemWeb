<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database

// Proses hanya jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape input untuk mencegah SQL injection
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);
    $order_date = mysqli_real_escape_string($mysqli, $_POST['order_date']);
    $order_time = mysqli_real_escape_string($mysqli, $_POST['order_time']);
    $total_amount = mysqli_real_escape_string($mysqli, $_POST['total_amount']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    // Validasi data input
    if (empty($customer_id) || empty($order_date) || empty($order_time) || empty($total_amount) || empty($status)) {
        echo "Semua kolom wajib diisi.";
    } else {
        // Menambahkan data order ke database
        $query = "INSERT INTO orders (customer_id, order_date, order_time, total_amount, status)
                  VALUES ('$customer_id', '$order_date', '$order_time', '$total_amount', '$status')";
        if (mysqli_query($mysqli, $query)) {
            echo "Order berhasil ditambahkan! <a href='list_order.php'>Lihat Daftar Order</a>";
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
