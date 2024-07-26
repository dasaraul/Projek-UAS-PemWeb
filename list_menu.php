<?php
session_start();
require_once("bwatkonek.php");

// Ambil data menu
$menuItemsResult = mysqli_query($mysqli, "SELECT * FROM menu_items ORDER BY menu_item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>List Menu</h2>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="add_menu.php">Tambah Menu</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Item Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Available</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($menuItemsResult)) {
                echo "<tr>";
                echo "<td>".$res['item_name']."</td>";
                echo "<td>".$res['description']."</td>";
                echo "<td>".$res['price']."</td>";
                echo "<td>".$res['category']."</td>";
                echo "<td>".($res['available'] ? 'Yes' : 'No')."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_menu.php?id=".$res['menu_item_id']."'>Edit</a> | <a href='delete_menu.php?id=".$res['menu_item_id']."' onclick='return confirm(\"Are you sure?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
