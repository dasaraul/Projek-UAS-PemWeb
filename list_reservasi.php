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
    <?php include("navbar.php"); ?>

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
                    echo "<td><a href='edit_reservasi.php?id=".['reservation_id']."'>Edit</a> | <a href='delete_reservasi.php?id=".['reservation_id']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a></td>"; // Link untuk edit dan hapus
                }
                echo "</tr>"; // Akhir baris tabel
            }
            ?>
        </table>
    </div>
</body>
</html>
