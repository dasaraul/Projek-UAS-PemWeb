<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM customers WHERE customer_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_pelanggan.php");
?>
