<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data item order
$query = "DELETE FROM order_items WHERE order_item_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_order_item.php"); // Arahkan ke halaman daftar item order setelah berhasil
?>