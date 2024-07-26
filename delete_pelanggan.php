<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data pelanggan
$query = "DELETE FROM customers WHERE customer_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_pelanggan.php"); // Arahkan ke halaman daftar pelanggan setelah berhasil
?>
