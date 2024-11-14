<?php
session_start();
require_once("bwatkonek.php"); // Koneksi ke database

// Proses hanya jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape input untuk mencegah SQL injection
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $nama_lengkap = mysqli_real_escape_string($mysqli, $_POST['namalengkap']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    // Validasi data input
    if (empty($username) || empty($password) || empty($nama_lengkap) || empty($email)) {
        echo "Semua kolom wajib diisi.";
    } else {
        // Enkripsi password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Menambahkan data pengguna ke database
        $query = "INSERT INTO users (username, password, nama_lengkap, email)
                  VALUES ('$username', '$hashed_password', '$nama_lengkap', '$email')";
        if (mysqli_query($mysqli, $query)) {
            header("Location: list_users.php"); // Redirect setelah berhasil
            exit;
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
