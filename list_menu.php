<?php
session_start();
require_once("bwatkonek.php");

// Mengambil semua data menu dari database
$result = mysqli_query($mysqli, "SELECT * FROM menu_items ORDER BY menu_item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>Daftar Menu</h2>
        <table border="1">
            <tr>
                <th>Nama Item</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Tersedia</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            // Menampilkan data menu dalam tabel
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['item_name']."</td>";
                echo "<td>".$res['description']."</td>";
                echo "<td><a href=\"edit_menu.php?id={$res['menu_item_id']}\">Edit</a> | <a href=\"delete_menu.php?id={$res['menu_item_id']}\" onClick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a></td>";
            }
            echo "</tr>";
        
        ?>
    </table>
</div>
<a href="add_action.php">Tambah Menu</a>
</body>
</html>
