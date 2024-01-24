<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();

$types = findAll($bdd, 'types');

require_once '../../views/layouts/header.php';

?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des types</h1>
        <a href="new.php" class="btn btn-primary">Ajouter un type</a>
    </div>

    <table class="table">
        <thead>
            <tr class="table-header">
                <th>ID</th>
                <th>NOM</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
        <?php if (count($types) > 0) { ?>
            <?php foreach ($types as $type) : ?>
                <tr>
                    <td> <?= $type['id']; ?></td>
                    <td> <?= $type['nom']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $type['id']; ?>" class="btn btn-warning">Modifier</a>
                        <form action= "delete.php?id=<?= $type['id'] ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce type ?')" style="display: inline">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center">Aucun type n'est enregistré</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php require_once '../../views/layouts/footer.php'; ?>