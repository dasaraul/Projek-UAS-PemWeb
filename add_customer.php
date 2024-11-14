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
        $error_message = "Semua kolom wajib diisi.";
    } else {
        // Menambahkan data pelanggan ke database
        $query = "INSERT INTO customers (first_name, last_name, email, phone_number)
                  VALUES ('$first_name', '$last_name', '$email', '$phone_number')";
        if (mysqli_query($mysqli, $query)) {
            header('Location: list_pelanggan.php'); // Redirect setelah berhasil
            exit;
        } else {
            $error_message = "Terjadi kesalahan: " . mysqli_error($mysqli);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Pelanggan</h2>
        <!-- Tampilkan pesan error jika ada -->
        <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>
        <!-- Form tambah pelanggan -->
        <form method="POST">
            <table>
                <tr>
                    <td>Nama Depan:</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <td>Nama Belakang:</td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Nomor Telepon:</td>
                    <td><input type="text" name="phone_number" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
        <p><a href="list_pelanggan.php">Kembali ke Daftar Pelanggan</a></p>
    </div>
</body>
</html>
