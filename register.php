<?php
require_once("bwatkonek.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_DEFAULT));
    $namalengkap = mysqli_real_escape_string($mysqli, $_POST['namalengkap']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $unique_key = mysqli_real_escape_string($mysqli, $_POST['unique_key']);

    if ($unique_key == 'tamanich') {
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

<html>
<head>
    <title>Register</title>
</head>

<body>
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
    </center>
</body>
</html>
