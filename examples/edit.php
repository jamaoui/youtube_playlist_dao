<?php
require 'app/models/Stagiaire.php';

$stagiaire = new Stagiaire();
$stagiaire->setPassword(12345);
$stagiaire->setAge(25);
$stagiaire->setNom("Slimani");
$stagiaire->setPrenom("Slimane");
$stagiaire->setLogin("slimani");
$stagiaire->edit(8);
