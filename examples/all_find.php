<?php
require 'app/models/Stagiaire.php';

echo "<pre>";
?>
    <h4>Find</h4>
<?php
var_dump(Stagiaire::find(1));
?>

<h4>All</h4>
<?php
var_dump(Stagiaire::all());
echo "</pre>";