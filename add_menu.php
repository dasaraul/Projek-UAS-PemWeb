<?php
// Mengecek apakah pengguna sudah login
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Home</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h2>Tambah Menu</h2>
        <form action="add_menu_action.php" method="post">
            <table>
                <tr>
                    <td>Nama Item:</td>
                    <td><input type="text" name="item_name" required></td>
                </tr>
                <tr>
                    <td>Deskripsi:</td>
                    <td><textarea name="description" required></textarea></td>
                </tr>
                <tr>
                    <td>Harga:</td>
                    <td><input type="number" step="0.01" name="price" required></td>
                </tr>
                <tr>
                    <td>Kategori:</td>
                    <td><input type="text" name="category" required></td>
                </tr>
                <tr>
                    <td>Tersedia:</td>
                    <td>
                        <select name="available">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
