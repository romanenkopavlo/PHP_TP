<?php
    require_once "GestionContacts.php";
    $gestionContacts = new GestionContacts();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Le Titre</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>

    <body>
    <header>
        <h1 class="center-align">Contacts</h1>
    </header>
        <section>
            <div class="row">
                <div class="col s4"></div>
                <div class="col s4 m4">
                    <div class="card teal lighten-2 z-depth-5 white-text">
                        <div class="card-image">
                            <img src="images/consultant-liste-contacts.jpg">
                            <span class="card-title black-text">Card Title</span>
                        </div>
                        <div class="card-content">
                            <h3>Liste de contacts</h3>
                            <?php $gestionContacts->afficherContacts(); ?>
                        </div>
                        <div class="card-action">
                            <form action="index.php" method="post">
                                <br><br>
                                <button class="waves-effect waves-light btn" type="submit" name="parNom">Trier par nom</button>
                                <button class="waves-effect waves-light btn" type="submit" name="parPrenom">Trier par prénom</button>
                                <br><br>
                            </form>
                        </div>
                    </div>
                    <h3>Ajouter ou supprimer un contact</h3>
                    <form action="index.php" method="post">
                        <input type="text" name="nom" id="nom">
                        <label for="nom">Nom</label>
                        <input type="text" name="prenom" id="prenom">
                        <label for="prenom">Prenom</label>
                        <br><br>
                        <button class="waves-effect waves-light btn" type="submit" name="ajouter">Ajouter</button>
                        <button class="waves-effect waves-light btn" type="submit" name="supprimer">Supprimer</button>
                    </form>
                </div>
                <div class="col s4"></div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>