<?php
session_start();
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number)) {
        echo "<font color='red'>Semua field harus diisi.</font><br/>";
        echo "<a href='javascript:self.history.back();'>Kembali</a>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')");
        echo "<p><font color='green'>Data berhasil ditambahkan!</font></p>";
        echo "<a href='list_pelanggan.php'>Lihat Daftar Pelanggan</a>";
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
        <form action="add_pelanggan.php" method="post">
            <table border="0">
                <tr> 
                    <td>First Name</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr> 
                    <td>Last Name</td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr> 
                    <td>Phone Number</td>
                    <td><input type="text" name="phone_number" required></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
