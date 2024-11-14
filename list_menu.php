<?php
session_start();
require_once("bwatkonek.php");

// Ambil data menu
$menuItemsResult = mysqli_query($mysqli, "SELECT * FROM menu_items ORDER BY menu_item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container">
        <h2>Daftar Menu</h2>
        <?php if (isset($_SESSION['loggedin'])): ?> <!-- Cek jika pengguna sudah login -->
        <a href="add_menu.php">Tambah Menu</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
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
            while ($res = mysqli_fetch_assoc($menuItemsResult)) {
                echo "<tr>";
                echo "<td>".$res['item_name']."</td>";
                echo "<td>".$res['description']."</td>";
                echo "<td>".$res['price']."</td>";
                echo "<td>".$res['category']."</td>";
                echo "<td>".($res['available'] ? 'Ya' : 'Tidak')."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_menu.php?id=".['menu_item_id']."'>Edit</a> | <a href='delete_menu.php?id=".['menu_item_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
