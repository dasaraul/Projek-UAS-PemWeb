<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

// Query untuk menghapus data menu
$query = "DELETE FROM menu_items WHERE menu_item_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_menu.php"); // Arahkan ke halaman daftar menu setelah berhasil
?>
