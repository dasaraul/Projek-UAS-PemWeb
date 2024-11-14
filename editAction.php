<?php
// Include the database connection file
require_once("bwatkonek.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    // Escape string untuk menghindari SQL injection
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $namalengkap = mysqli_real_escape_string($mysqli, $_POST['namalengkap']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    
    // Jika password kosong, jangan update password
    if (empty($password)) {
        $result = mysqli_query($mysqli, "UPDATE users SET username='$username', namalengkap='$namalengkap', email='$email' WHERE id=$id");
    } else {
        // Hash password sebelum disimpan ke database
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($mysqli, "UPDATE users SET username='$username', namalengkap='$namalengkap', email='$email', password='$password' WHERE id=$id");
    }
    
    // Redirect ke halaman index setelah update
    header("Location: index.php");
}
?>
