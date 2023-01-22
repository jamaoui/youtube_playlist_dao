<?php
$title = "Ajouter voiture";
ob_start();
?>
    <form action="index.php?action=store" method="post">
        <div class="form-group">
            <label>Modele</label>
            <input type="text" class="form-control" name="modele" placeholder="Modele">
        </div>
        <div class="form-group">
            <label>Prix</label>
            <input type="text" class="form-control" name="prix" placeholder="Modele">
        </div>
        <button type="submit" class="btn btn-primary my-3">Ajouter</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
