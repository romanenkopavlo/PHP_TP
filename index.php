<?php
    require_once "GestionContacts.php";
    $gestionContacts = new GestionContacts();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Le Titre</title>
        <meta charset="utf-8">
    </head>

    <body>

        <header>
            <div>
                <h2>TD1_PHP_POO</h2>
            </div>
        </header>

        <section>
            <h3>Liste de contacts</h3>
            <?php $gestionContacts->afficherContacts(); ?>
            <h3>Ajouter un nouveau contact</h3>
            <form action="index.php" method="GET">
                <input type="text" name="nom" id="nom">
                <label for="nom">Nom</label>
                <input type="text" name="prenom" id="prenom">
                <label for="prenom">Prenom</label>
                <button type="submit">Ajouter</button>
            </form>
        </section>
        <footer>
            BTS CIEL LPO ASTIER 2024
        </footer>

    </body>
</html>