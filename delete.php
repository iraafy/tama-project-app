<?php
if (isset($GET["id_topic"])) {
    $id = $GET["id_topic"];

    $connection = new mysqli('localhost', 'root', '', 'db_tama');
    $sql = "DELETE FROM topic WHERE id_topic=$id";

    $connection->query($sql);
}

header("location:table.php?pesan=hapus");
exit;
?>