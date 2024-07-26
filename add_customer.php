<?php
session_start();
require_once("bwatkonek.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number)) {
        $error_message = "All fields are required.";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')");
        if ($result) {
            header('Location: list_pelanggan.php');
            exit;
        } else {
            $error_message = "Failed to add customer.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h2>Add Customer</h2>
        <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>
        <form method="POST">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone_number" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add"></td>
                </tr>
            </table>
        </form>
        <p><a href="list_pelanggan.php">Back to List</a></p>
    </div>
</body>
</html>
