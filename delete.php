<?php
require 'db.php';
$id = (int)$_GET['id'];
$conn->query("DELETE FROM films WHERE id=$id");
header("Location: index.php");
exit;
?>