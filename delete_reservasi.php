<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data reservasi
$query = "DELETE FROM reservations WHERE reservation_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_reservasi.php"); // Arahkan ke halaman daftar reservasi setelah berhasil
?>
