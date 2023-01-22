<?php
require 'app/models/Stagiaire.php';

echo "<pre>";
//var_dump(Stagiaire::where('age',26,'>='));
var_dump(Stagiaire::find(2));

echo "</pre>";