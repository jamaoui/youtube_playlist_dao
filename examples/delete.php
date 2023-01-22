<?php
require "Autoloader.php";
Autoloader::register();

use app\models\Stagiaire;

//require 'app/models/Stagiaire.php';

$stagiaire = new Stagiaire();
$stagiaire2 =  new Stagiaire();
$stagiaire2->delete(6);
$stagiaire->delete(4);
