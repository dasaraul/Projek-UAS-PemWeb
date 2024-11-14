<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Proses hanya jika data dikirim melalui formulir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape input untuk mencegah SQL injection
    $nama_kategori = mysqli_real_escape_string($mysqli, $_POST['nama_kategori']);
    $deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);

    // Validasi data input
    if (empty($nama_kategori) || empty($deskripsi)) {
        echo "Semua kolom wajib diisi.";
    } else {
        // Menambahkan data kategori ke database
        $query = "INSERT INTO kategori (nama_kategori, deskripsi)
                  VALUES ('$nama_kategori', '$deskripsi')";
        if (mysqli_query($mysqli, $query)) {
            header("Location: list_kategori.php"); // Redirect setelah berhasil
            exit;
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
