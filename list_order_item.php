<?php
require_once("bwatkonek.php");
require_once("layout/nav.php");

// Ambil data item order
$orderItemsResult = mysqli_query($mysqli, "SELECT * FROM order_items ORDER BY order_item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Item Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h1>Daftar Item Order</h1>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="add_order_item.php">Tambah Item Order</a>
        <?php endif; ?>

        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Order ID</th>
                <th>Menu Item ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($orderItemsResult)) {
                echo "<tr>";
                echo "<td>".$res['order_id']."</td>";
                echo "<td>".$res['menu_item_id']."</td>";
                echo "<td>".$res['quantity']."</td>";
                echo "<td>".$res['price']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_order_item.php?id=".$res['order_item_id']."'>Edit</a> | <a href='delete_order_item.php?id=".$res['order_item_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
