<?php

    require("pdo.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM annuaire WHERE id_annuaire = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    $pdo = null;

    header("Location: index.php");