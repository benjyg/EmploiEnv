<?php

    require("pdo.php");


    $id_annuaire = $_POST['id_annuaire'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $genre = $_POST['genre'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $dateNaissance = $_POST['dateNaissance'] ? $_POST['dateNaissance'] : null;
    $telephone = $_POST['telephone'];
    $fax = $_POST['fax'];
    $mail = $_POST['mail'];
    $url = $_POST['url'];

    if($id_annuaire == "")
    {
        $sql = "INSERT INTO annuaire (nom, prenom, genre_id, adresse, code_postal, ville, pays, date_naissance, telephone, fax, mail, url) VALUES (:nom, :prenom, :genre, :adresse, :cp, :ville, :pays, :dateNaissance, :telephone, :fax, :mail, :url)";
    }
    else
    {
        $sql = "UPDATE annuaire  SET nom = :nom, prenom = :prenom, genre_id = :genre, adresse = :adresse, code_postal = :cp, ville = :ville, pays = :pays, date_naissance = :dateNaissance, telephone = :telephone, fax = :fax, mail = :mail, url = :url WHERE id_annuaire = :id";
    }

    $stmt = $pdo->prepare($sql);

    if($id_annuaire != "")
    {
        $stmt->bindParam(':id', $id_annuaire);
    }

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':cp', $cp);
    $stmt->bindParam(':ville', $ville);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':dateNaissance', $dateNaissance);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':fax', $fax);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':url', $url);

    $stmt->execute();

    if($id_annuaire != "")
    {
        $lastInsertedId = $id_annuaire;
    }
    else
    {
        $lastInsertedId = $pdo->lastInsertId();
    }

    $pdo = null;
    header("Location: index.php?id=" . $lastInsertedId);

