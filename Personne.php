<?php

class Personne
{
    private $nom;
    public $prenom;
    public $annee_naissance;

    public function __construct() {

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