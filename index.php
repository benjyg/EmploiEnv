<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Annuaire
    </title>
    <link rel="stylesheet" href="style.css">
    <?php
        require('pdo.php');
    ?>
</head>
<body>
    <div class="container">
        <div class="left-block">
            <div class="add-button-container">
                <a href="index.php">
                    <button class="add-button">
                        Ajouter une personne
                    </button>
                </a>
            </div>
            <ul class="name-list">
                <?php
                    $query = "SELECT * FROM annuaire";
                    $stmt = $pdo->query($query);

                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($results as $row) {
                         $id = $row['id_annuaire'];
                         $nomPrenom = $row['nom'] . ' ' . $row['prenom'];

                         echo "<li><a href='index.php?id=$id'>$nomPrenom</a></li>";
                     }
                ?>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
                <li><a href='#'>TEST</a></li>
            </ul>
        </div>
        <div class="right-block">
            <form action="save.php" method="POST">
                <?php
                    $havingData = false;
                    if (isset($_GET['id']))
                    {
                        $sql = "SELECT * FROM annuaire WHERE id_annuaire = :id";

                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':id', $_GET['id']);
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        if($row)
                        {
                            $havingData = true;
                        }
                    }
                ?>
                <input type="hidden" name="id_annuaire" value="<?php echo($havingData ? $row['id_annuaire'] : '') ?>"/>
                <div class="form-container">
                    <div class="form-row">
                        <input type="text" class="form-field" placeholder="Nom" name="nom" value="<?php echo($havingData ? $row['nom'] : '') ?>" required>
                        <input type="text" class="form-field" placeholder="Prénom" name="prenom" value="<?php echo($havingData ? $row['prenom'] : '') ?>" required>
                    </div>

                    <select class="form-field" name='genre'>
                        <?php
                            $query = "SELECT * FROM genre";
                            $stmt = $pdo->query($query);

                            $result_genre = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result_genre as $genre) {
                                $id = $genre['id_genre'];
                                $libelle = $genre['libelle'];

                                echo "<option value='$id' " . (($id == $row['genre_id']) ? 'selected' : '') . ">$libelle</option>";

                             }
                        ?>
                    </select>
                    <input type="text" class="form-field" placeholder="Adresse" name="adresse" value="<?php echo($havingData ? $row['adresse'] : '') ?>">

                    <input type="text" class="form-field" placeholder="Ville" name="ville" value="<?php echo($havingData ? $row['ville'] : '') ?>">

                    <div class="form-row">
                        <input type="text" class="form-field" placeholder="Code Postal" name="cp" value="<?php echo($havingData ? $row['code_postal'] : '') ?>">
                        <input type="text" class="form-field" placeholder="Pays" name="pays" value="<?php echo($havingData ? $row['pays'] : '') ?>">
                    </div>

                    <input type="date" class="form-field" name="dateNaissance" value="<?php echo($havingData ? $row['date_naissance'] : '') ?>">

                    <div class="form-row">
                        <input type="text" class="form-field" placeholder="Téléphone" name="telephone" value="<?php echo($havingData ? $row['telephone'] : '') ?>">
                        <input type="text" class="form-field" placeholder="Fax" name="fax" value="<?php echo($havingData ? $row['fax'] : '') ?>">
                    </div>

                    <div class="form-row">
                        <input id="mail" type="text" class="form-field" placeholder="Email" name="mail" value="<?php echo($havingData ? $row['mail'] : '') ?>" oninput="validateEmail()">
                        <input id="url" type="text" class="form-field" placeholder="URL" name="url" value="<?php echo($havingData ? $row['url'] : '') ?>" oninput="verifierURL()">
                    </div>

                    <div class="action-buttons">
                        <button id="btnSave" type="submit" class="save-button">
                            Enregistrer
                        </button>
                        <a href="delete.php?id=<?php echo($havingData ? $row['id_annuaire'] : '') ?>">
                            <input type="button" class="delete-button" value="Supprimer">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateEmail()
        {
            var emailInput = document.getElementById('mail').value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let bouton = document.getElementById('btnSave');

            if (emailRegex.test(emailInput) || emailInput == "")
            {
                bouton.disabled = false;
            }
            else
            {
                bouton.disabled = true;
            }
        }

        function verifierURL() {
            var urlInput = document.getElementById('url').value;
            var urlRegex = /^(https?|http):\/\/[^\s/$.?#].[^\s]*$/;
            let bouton = document.getElementById('btnSave');

            if (urlRegex.test(urlInput) || urlInput == "")
            {
                console.log("if ok")
                bouton.disabled = false;
            }
            else
            {
                console.log("if pas ok")
                bouton.disabled = true;
            }
        }

    </script>
</body>
</html>