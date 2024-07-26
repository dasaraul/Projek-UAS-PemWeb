<?php
session_start(); // Mulai sesi, agar bisa menggunakan variabel sesi
require_once("bwatkonek.php"); // Menghubungkan ke file koneksi database

// Ambil data reservasi dari database
$reservationsResult = mysqli_query($mysqli, "SELECT * FROM reservations ORDER BY reservation_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css"> <!-- Link ke file CSS -->
</head>
<body>
    <div class="navbar">
        <a href="index.php">Beranda</a> <!-- Link ke halaman beranda -->
        <a href="list_pelanggan.php">Daftar Pelanggan</a> <!-- Link ke halaman daftar pelanggan -->
        <a href="list_order.php">Daftar Order</a> <!-- Link ke halaman daftar order -->
        <a href="list_menu.php">Daftar Menu</a> <!-- Link ke halaman daftar menu -->
        <?php if (isset($_SESSION['loggedin'])): ?> <!-- Cek apakah pengguna sudah login -->
            <a href="logout.php">Keluar</a> <!-- Link untuk logout -->
        <?php else: ?>
            <a href="login.php">Masuk</a> <!-- Link untuk login jika belum login -->
        <?php endif; ?>
    </div>

    <div class="container">
        <h2>Daftar Reservasi</h2> <!-- Judul halaman -->
        <?php if (isset($_SESSION['loggedin'])): ?> <!-- Cek jika pengguna sudah login -->
            <a href="add_reservasi.php">Tambah Reservasi</a> <!-- Link untuk menambah reservasi -->
        <?php endif; ?>
        <table width='100%' border=0>
            <tr bgcolor='#DDDDDD'> <!-- Baris header tabel dengan background abu-abu -->
                <th>Tanggal Reservasi</th> <!-- Kolom untuk tanggal reservasi -->
                <th>Waktu Reservasi</th> <!-- Kolom untuk waktu reservasi -->
                <th>Jumlah Tamu</th> <!-- Kolom untuk jumlah tamu -->
                <th>Permintaan Khusus</th> <!-- Kolom untuk permintaan khusus -->
                <?php if (isset($_SESSION['loggedin'])): ?> <!-- Cek jika pengguna sudah login -->
                    <th>Aksi</th> <!-- Kolom untuk aksi seperti edit dan hapus -->
                <?php endif; ?>
            </tr>
            <?php
            // Loop untuk menampilkan data reservasi
            while ($res = mysqli_fetch_assoc($reservationsResult)) {
                echo "<tr>"; // Mulai baris baru di tabel
                echo "<td>".$res['reservation_date']."</td>"; // Tanggal reservasi
                echo "<td>".$res['reservation_time']."</td>"; // Waktu reservasi
                echo "<td>".$res['number_of_guests']."</td>"; // Jumlah tamu
                echo "<td>".$res['special_requests']."</td>"; // Permintaan khusus
                if (isset($_SESSION['loggedin'])) { // Cek jika pengguna sudah login
                    echo "<td><a href='edit_reservasi.php?id=".$res['reservation_id']."'>Edit</a> | <a href='delete_reservasi.php?id=".$res['reservation_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>"; // Link untuk edit dan hapus
                }
                echo "</tr>"; // Akhir baris tabel
            }
            ?>
        </table>
    </div>
</body>
</html>
