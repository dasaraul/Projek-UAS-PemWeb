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
    $item_name = mysqli_real_escape_string($mysqli, $_POST['item_name']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);
    $available = mysqli_real_escape_string($mysqli, $_POST['available']);

    // Menambahkan data menu ke database
    $query = "INSERT INTO menu_items (item_name, description, price, category, available) VALUES ('$item_name', '$description', '$price', '$category', '$available')";
    if (mysqli_query($mysqli, $query)) {
        echo "Menu berhasil ditambahkan! <a href='list_menu.php'>Lihat Daftar Menu</a>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
