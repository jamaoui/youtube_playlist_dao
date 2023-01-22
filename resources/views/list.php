<?php
$title = "Liste des voitures";
ob_start();
?>
    <a href="index.php?action=create" class="btn btn-primary">Ajouter voiture</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Modele</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>
        <?php /** @var \app\models\Voiture[] $data */
        foreach ($data as $voiture): ?>
            <tr>
                <td><?= $voiture->getId() ?></td>
                <td><?= $voiture->getModele() ?></td>
                <td><?= $voiture->getPrix() ?> $</td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $voiture->getId() ?>" class="btn btn-success btn-sm">Modifier</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer la voiture <?= $voiture->getModele() ?>');" href="index.php?action=destroy&id=<?php echo $voiture->getId() ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
$content = ob_get_clean();
include_once 'layout.php';
