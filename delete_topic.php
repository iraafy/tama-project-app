<?php
// if (isset($GET["id_topic"])) {
//     $id = $GET["id_topic"];

//     $connection = new mysqli('localhost', 'root', '', 'db_tama');
//     $sql = "DELETE FROM topic WHERE id_topic=$id";

//     $connection->query($sql);
// }

$conn = new mysqli('localhost', 'root', '', 'db_tama');
$query = "DELETE FROM topic WHERE id_topic = $_GET[id_topic]";
mysqli_query($conn, $query);
header("location: /tama-project-app/table_topic.php");

exit;
?> 