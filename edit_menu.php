<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $available = isset($_POST['available']) ? 1 : 0;

    // Query untuk memperbarui data menu
    $query = "UPDATE menu_items SET item_name='$item_name', description='$description', price='$price', category='$category', available='$available' WHERE menu_item_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_menu.php"); // Arahkan ke halaman daftar menu setelah berhasil
}

// Ambil data menu berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM menu_items WHERE menu_item_id=$id");
$menu = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Edit Menu</h1>
        <form method="POST" action="">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" value="<?php echo $menu['item_name']; ?>" required>
            <br>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo $menu['description']; ?></textarea>
            <br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo $menu['price']; ?>" required>
            <br>

            <label for="category">Category:</label>
            <input type="text" name="category" value="<?php echo $menu['category']; ?>" required>
            <br>

            <label for="available">Available:</label>
            <input type="checkbox" name="available" value="1" <?php echo $menu['available'] ? 'checked' : ''; ?>>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
