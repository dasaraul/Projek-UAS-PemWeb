<?php
// Memulai sesi untuk mengelola otentikasi
session_start();
require_once("bwatkonek.php"); // Koneksi ke database

// Memastikan pengguna telah login sebelum menambahkan menu
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Proses data hanya jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape input untuk mencegah SQL injection
    $item_name = mysqli_real_escape_string($mysqli, $_POST['item_name']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);
    $availability = mysqli_real_escape_string($mysqli, $_POST['available']);

    // Validasi data input
    if (empty($item_name) || empty($description) || empty($price) || empty($category) || empty($availability)) {
        echo "Semua kolom wajib diisi.";
    } else {
        // Menambahkan item menu ke database
        $query = "INSERT INTO menu_items (item_name, description, price, category, available)
                  VALUES ('$item_name', '$description', '$price', '$category', '$availability')";
        if (mysqli_query($mysqli, $query)) {
            echo "Menu berhasil ditambahkan! <a href='list_menu.php'>Lihat Daftar Menu</a>";
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
