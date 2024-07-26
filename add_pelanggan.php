<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $query = "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')";
    mysqli_query($mysqli, $query);

    header("Location: list_pelanggan.php");
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
        <h1>Tambah Pelanggan</h1>
        <form method="POST" action="">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" required>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
