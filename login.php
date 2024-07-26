<?php
session_start();
require_once("bwatkonek.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $unique_key = mysqli_real_escape_string($mysqli, $_POST['unique_key']);

    if ($unique_key == 'tamanich') {
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username'");
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username; // Menyimpan username dalam sesi
            header('Location: dashboard.php');
            exit;
        } else {
            $error_message = "Username atau password salah.";
        }
    } else {
        $error_message = "Unique key salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>Login</h2>
            <?php
            if (isset($error_message)) {
                echo "<p style='color:red;'>$error_message</p>";
            }
            ?>
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
                        <td>Unique Key:</td>
                        <td><input type="text" name="unique_key" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Login"></td>
                    </tr>
                </table>
            </form>
            <a href="register.php">Register</a>
        </center>
    </div>
</body>
</html>
