<?php
require_once "Contact.php";
class GestionContacts
{
    public $tabContacts;
    public function __construct()
    {
        $this->tabContacts = array
        (
            new Contact("DUPOND", "Alban"),
            new Contact("HELLY", "Fred"),
            new Contact("JOLIVET", "Max"),
            new Contact("MORY", "Rémi")
        );
    }

    public function trierParNomAsc() {
        usort($this->tabContacts, function ($c1, $c2) {
            return strcmp($c1->getNom(), $c2->getNom());
        });
    }

    public function ajouterContacts() {
        $this->tabContacts[] = new Contact($_GET["nom"], $_GET["prenom"]);
        echo "Le noveau contact à ajouter ".strtoupper($_GET["nom"])." ".$_GET["prenom"];
    }
    public function afficherContacts() {
        if (!empty($_GET)) {
            $this->ajouterContacts();
        }
        $this->trierParNomAsc();
        echo "<ul>";
        for ($i = 0; $i < count($this->tabContacts); $i++) {
            echo "<li>".$this->tabContacts[$i]->getNom()." ".$this->tabContacts[$i]->prenom."</li>";
        }
        echo "</ul>";
    }
}