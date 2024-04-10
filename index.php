<?php

require_once "Personne.php";

$personne = new Personne();

$personne->setNom('DUPUIS');
$personne->prenom = 'Franck';
$personne->annee_naissance = 1974;

echo $personne->getNom().'<br>';
echo $personne->prenom.'<br>';
echo $personne->calculerAge().' ans';