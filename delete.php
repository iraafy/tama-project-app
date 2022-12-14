<?php
$conn = new mysqli('localhost', 'root', '', 'db_tama');
$query = "DELETE FROM topic WHERE id_topic = $_GET[id_topic]";
mysqli_query($conn, $query);
header('location: table.php');
