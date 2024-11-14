<?php
// Konfigurasi koneksi database
$host = 'localhost'; // Host database
$user = 'root'; // Username database
$password = ''; // Password database
$database = 'pemweb_db'; // Nama database

// Membuat koneksi ke database
$mysqli = new mysqli($host, $user, $password, $database);

// Mengecek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Mengatur charset untuk koneksi
$mysqli->set_charset("utf8");
?>
