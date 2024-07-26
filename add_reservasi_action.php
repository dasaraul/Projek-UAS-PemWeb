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
    $reservation_date = mysqli_real_escape_string($mysqli, $_POST['reservation_date']);
    $reservation_time = mysqli_real_escape_string($mysqli, $_POST['reservation_time']);
    $number_of_guests = mysqli_real_escape_string($mysqli, $_POST['number_of_guests']);
    $special_requests = mysqli_real_escape_string($mysqli, $_POST['special_requests']);

    // Menambahkan data reservasi ke database
    $query = "INSERT INTO reservations (customer_id, reservation_date, reservation_time, number_of_guests, special_requests) VALUES ('$customer_id', '$reservation_date', '$reservation_time', '$number_of_guests', '$special_requests')";
    if (mysqli_query($mysqli, $query)) {
        echo "Reservasi berhasil ditambahkan! <a href='list_reservasi.php'>Lihat Daftar Reservasi</a>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
