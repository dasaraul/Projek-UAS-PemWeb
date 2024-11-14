<?php
require_once("bwatkonek.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form dan menghindari SQL injection dengan mysqli_real_escape_string
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_DEFAULT));
    $namalengkap = mysqli_real_escape_string($mysqli, $_POST['namalengkap']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $unique_key = mysqli_real_escape_string($mysqli, $_POST['unique_key']);

    if ($unique_key == 'tamanich') {
        // Menyimpan data pengguna ke database
        $result = mysqli_query($mysqli, "INSERT INTO users (username, password, namalengkap, email) VALUES ('$username', '$password', '$namalengkap', '$email')");
        if ($result) {
            echo "Registrasi berhasil. <a href='login.php'>Login</a>";
        } else {
            echo "Terjadi kesalahan.";
        }
    } else {
        echo "Unique key salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container">
        <center>
            <h2>Register</h2>
            <form method="POST">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap:</td>
                        <td><input type="text" name="namalengkap" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Unique Key:</td>
                        <td><input type="text" name="unique_key" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Register"></td>
                    </tr>
                </table>
            </form>
            <a href="login.php">Masuk</a>
        </center>
    </div>
</body>
</html>
