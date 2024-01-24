<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();

$pokemons = findAll($bdd, 'pokemons');

require_once '../../views/layouts/header.php';

?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des pokémons</h1>
        <a href="new.php" class="btn btn-primary">Ajouter un pokémon</a>
    </div>

    <table class="table">
        <thead>
            <tr class="table-header">
                <th>ID</th>
                <th>NOM</th>
                <th>NIVEAU</th>
                <th>EXP EN COURS</th>
                <th>ID pokemon</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
        <?php if (count($pokemons) > 0) { ?>
            <?php foreach ($pokemons as $pokemon) : ?>
                <tr>
                    <td> <?= $pokemon['id']; ?></td>
                    <td> <?= $pokemon['nom']; ?></td>
                    <td> <?= $pokemon['niveau']; ?></td>
                    <td> <?= $pokemon['exp_en_cours']; ?></td>
                    <td> <?= $pokemon['id_dresseur']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $pokemon['id']; ?>" class="btn btn-warning">Modifier</a>
                        <form action= "delete.php?id=<?= $pokemon['id'] ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce pokemon ?')" style="display: inline">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center">Aucun pokemon n'est enregistré</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php require_once '../../views/layouts/footer.php'; ?>