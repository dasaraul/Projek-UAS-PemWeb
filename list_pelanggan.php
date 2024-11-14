<?php
session_start();
require_once("bwatkonek.php");

// Ambil data pelanggan
$customersResult = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY customer_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke CSS -->
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container">
        <h2>Daftar Pelanggan</h2>
        <?php if (isset($_SESSION['loggedin'])): ?> <!-- Cek jika pengguna sudah login -->
        <a href="add_pelanggan.php">Tambah Pelanggan</a>
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
            while ($res = mysqli_fetch_assoc($customersResult)) {
                echo "<tr>";
                echo "<td>".$res['first_name']."</td>";
                echo "<td>".$res['last_name']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['phone_number']."</td>";
                if (isset($_SESSION['loggedin'])) {
                    echo "<td><a href='edit_pelanggan.php?id=".['customer_id']."'>Edit</a> | <a href='delete_pelanggan.php?id=".['customer_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
