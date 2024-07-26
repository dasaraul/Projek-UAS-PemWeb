<?php
session_start();
require_once("bwatkonek.php");

$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM customers WHERE customer_id=$id");

header("Location: list_pelanggan.php");
?>
