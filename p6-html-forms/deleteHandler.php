<?php
    $id = $_GET['id'];

    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);

    $statement = $mysqli->prepare("DELETE FROM city WHERE ID = ?");

    $statement->bind_param("i", $id);

    if ($statement->execute()) {
        echo "O registro foi excluído com sucesso.";
    }

    $statement->close();
?>