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
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

    // Menambahkan data pelanggan ke database
    $query = "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')";
    if (mysqli_query($mysqli, $query)) {
        echo "Pelanggan berhasil ditambahkan! <a href='list_pelanggan.php'>Lihat Daftar Pelanggan</a>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
