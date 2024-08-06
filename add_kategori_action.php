<?php
session_start(); // Memulai sesi PHP
require_once("bwatkonek.php"); // Menyertakan file koneksi ke database

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Mengecek apakah data dikirim
if (isset($_POST['nama_kategori']) && isset($_POST['deskripsi'])) {
    $nama_kategori = mysqli_real_escape_string($mysqli, $_POST['nama_kategori']);
    $deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);

    // Query untuk menambah data kategori
    $query = "INSERT INTO kategori (nama_kategori, deskripsi) VALUES ('$nama_kategori', '$deskripsi')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: list_kategori.php"); // Arahkan ke halaman daftar kategori setelah berhasil
        exit;
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
