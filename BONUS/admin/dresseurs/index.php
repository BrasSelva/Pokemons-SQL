<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();

$dresseurs = findAll($bdd, 'dresseurs');

require_once '../../views/layouts/header.php';

?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des dresseurs</h1>
        <a href="new.php" class="btn btn-primary">Ajouter un dresseur</a>
    </div>

    <table class="table">
        <thead>
            <tr class="table-header">
                <th>ID</th>
                <th>NOM</th>
                <th>AGE</th>
                <th>GENRE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
        <?php if (count($dresseurs) > 0) { ?>
            <?php foreach ($dresseurs as $dresseur) : ?>
                <tr>
                    <td> <?= $dresseur['id']; ?></td>
                    <td> <?= $dresseur['nom']; ?></td>
                    <td> <?= $dresseur['age']; ?></td>
                    <td> <?= $dresseur['genre']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $dresseur['id']; ?>" class="btn btn-warning">Modifier</a>
                        <form action= "delete.php?id=<?= $dresseur['id'] ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce dresseur ?')" style="display: inline">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center">Aucun dresseur n'est enregistré</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php require_once '../../views/layouts/footer.php'; ?>