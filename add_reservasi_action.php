<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Proses hanya jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape input untuk mencegah SQL injection
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);
    $reservation_date = mysqli_real_escape_string($mysqli, $_POST['reservation_date']);
    $reservation_time = mysqli_real_escape_string($mysqli, $_POST['reservation_time']);
    $number_of_guests = mysqli_real_escape_string($mysqli, $_POST['number_of_guests']);
    $special_requests = mysqli_real_escape_string($mysqli, $_POST['special_requests']);

    // Validasi data input
    if (empty($customer_id) || empty($reservation_date) || empty($reservation_time) || empty($number_of_guests)) {
        echo "Semua kolom wajib diisi.";
    } else {
        // Menambahkan data reservasi ke database
        $query = "INSERT INTO reservations (customer_id, reservation_date, reservation_time, number_of_guests, special_requests)
                  VALUES ('$customer_id', '$reservation_date', '$reservation_time', '$number_of_guests', '$special_requests')";
        if (mysqli_query($mysqli, $query)) {
            header("Location: list_reservasi.php"); // Redirect setelah berhasil
            exit;
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
