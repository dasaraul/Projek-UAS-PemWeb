<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $available = isset($_POST['available']) ? 1 : 0;

    // Query untuk menambah data menu
    $query = "INSERT INTO menu_items (item_name, description, price, category, available) VALUES ('$item_name', '$description', '$price', '$category', '$available')";
    mysqli_query($mysqli, $query);

    header("Location: list_menu.php"); // Arahkan ke halaman daftar menu setelah berhasil
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Tambah Menu</h1>
        <form method="POST" action="">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" required>
            <br>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" required>
            <br>

            <label for="category">Category:</label>
            <input type="text" name="category" required>
            <br>

            <label for="available">Available:</label>
            <input type="checkbox" name="available" value="1">
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
