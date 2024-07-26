<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM orders WHERE order_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_order.php");
?>
