<?php
require_once "Contact.php";
class GestionContacts
{
    public $tabContacts;
    public function __construct()
    {
        $this->tabContacts = array();
        if (file_exists("archive.txt")) {
            if (filesize("archive.txt") !== 0) {
                $fileContent = file_get_contents("archive.txt");
                foreach (explode(PHP_EOL, $fileContent) as $row) {
                    $object = unserialize($row);
                    if ($object) {
                        $this->tabContacts[] = $object;
                    }
                }
            } else {
                $this->addData();
            }
        } else {
            $this->addData();
        }
        $this->tabContacts = $this->tabContactsUnique();
    }

    public function addData() {
        $this->tabContacts[] = new Contact("HUPOND", "Alban");
        $this->tabContacts[] = new Contact("DELLY", "Fred");
        $this->tabContacts[] = new Contact("AOLIVET", "Max");
        $this->tabContacts[] = new Contact("BORY", "Rémi");

        foreach($this->tabContacts as $contact) {
            file_put_contents("archive.txt", serialize($contact).PHP_EOL, FILE_APPEND);
        }
    }

    public function trierParNomAsc() {
        usort($this->tabContacts, function ($c1, $c2) {
            return strcmp(strtoupper($c1->getNom()), strtoupper($c2->getNom()));
        });
    }

    public function trierParPrenomAsc() {
        usort($this->tabContacts, function ($c1, $c2) {
            return strcmp(strtoupper($c1->getPrenom()), strtoupper($c2->getPrenom()));
        });
    }

    public function ajouterContacts() {
        $isFind = false;
        foreach($this->tabContacts as $contact) {
            if ($_POST["nom"] != $contact->getNom() && $_POST["prenom"] != $contact->getPrenom()) {
                $isFind = false;
            } else {
                $isFind = true;
            }

            if ($isFind) {
                break;
            }
        }

        if (!$isFind) {
            $this->tabContacts[] = new Contact($_POST["nom"], $_POST["prenom"]);
            file_put_contents("archive.txt", serialize($this->tabContacts[count($this->tabContacts) - 1]).PHP_EOL, FILE_APPEND);
            echo "Le noveau contact à ajouter ".strtoupper($_POST["nom"])." ".$_POST["prenom"];
            $this->tabContacts = $this->tabContactsUnique();
        } else {
            echo "Ce contact déja existe";
        }
    }

    public function tabContactsUnique() {
        $contactsSer = array_map("serialize", $this->tabContacts);
        $contactsSerUnique = array_unique($contactsSer);
        return array_map("unserialize", $contactsSerUnique);
    }
    public function afficherContacts() {
        if (!empty($_POST)) {
            if (isset($_POST["nom"]) && isset($_POST["prenom"])) {
                $this->ajouterContacts();
            } else if (array_key_exists("parNom", $_POST)) {
                $this->trierParNomAsc();
            } else if (array_key_exists("parPrenom", $_POST)) {
                $this->trierParPrenomAsc();
            }
        }
        echo "<ul>";
        for ($i = 0; $i < count($this->tabContacts); $i++) {
            echo "<li>".$this->tabContacts[$i]->getNom()." ".$this->tabContacts[$i]->prenom."</li>";
        }
        echo "</ul>";
    }
}