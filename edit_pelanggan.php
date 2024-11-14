<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Query untuk update data pelanggan
    $query = "UPDATE customers SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number' WHERE customer_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_pelanggan.php");
}

// Query untuk mengambil data pelanggan berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE customer_id=$id");
$customer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Pelanggan</h1>
        <form method="POST" action="">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo $customer['first_name']; ?>" required>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $customer['last_name']; ?>" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $customer['email']; ?>" required>
            <br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo $customer['phone_number']; ?>" required>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
