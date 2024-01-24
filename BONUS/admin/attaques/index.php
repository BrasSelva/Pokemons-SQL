<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();

$attaques = findAll($bdd, 'attaques');

require_once '../../views/layouts/header.php';

?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des attaques</h1>
        <a href="new.php" class="btn btn-primary">Ajouter un attaque</a>
    </div>

    <table class="table">
        <thead>
            <tr class="table-header">
                <th>ID</th>
                <th>NOM</th>
                <th>PUISSANCE</th>
                <th>PRECISION</th>
                <th>DESCRIPTION</th>
                <th>ID type</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
        <?php if (count($attaques) > 0) { ?>
            <?php foreach ($attaques as $attaque) : ?>
                <tr>
                    <td> <?= $attaque['id']; ?></td>
                    <td> <?= $attaque['nom']; ?></td>
                    <td> <?= $attaque['puissance']; ?></td>
                    <td> <?= $attaque['precisions']; ?></td>
                    <td> <?= $attaque['description']; ?></td>
                    <td> <?= $attaque['id_type']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $attaque['id']; ?>" class="btn btn-warning">Modifier</a>
                        <form action= "delete.php?id=<?= $attaque['id'] ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette attaque ?')" style="display: inline">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center">Aucune attaque n'est enregistrée</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php require_once '../../views/layouts/footer.php'; ?>