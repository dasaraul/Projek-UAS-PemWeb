<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database

// Proses hanya jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape input untuk mencegah SQL injection
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

    // Validasi data input
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number)) {
        echo "Semua kolom wajib diisi.";
    } else {
        // Menambahkan data pelanggan ke database
        $query = "INSERT INTO customers (first_name, last_name, email, phone_number)
                  VALUES ('$first_name', '$last_name', '$email', '$phone_number')";
        if (mysqli_query($mysqli, $query)) {
            header("Location: list_pelanggan.php"); // Redirect setelah berhasil
            exit;
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
