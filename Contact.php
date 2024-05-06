<?php

class Contact
{
    private $nom;
    public $prenom;
    public $annee_naissance;

    /**
     * @param $nom
     * @param $prenom
     */
    public function __construct($nom, $prenom)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function calculerAge() {
        return 2024 - $this->annee_naissance;
    }
}