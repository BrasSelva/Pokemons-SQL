<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";
$bdd = CONNECT_DB();

if(isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $niveau = $_POST["niveau"];
    $exp_en_cours = $_POST["exp_en_cours"];
    $id_dresseur = $_POST["id_dresseur"];

    $data = [
        "nom" => $nom,
        "niveau" => $niveau,
        "exp_en_cours" => $exp_en_cours,
        "id_dresseur" => $id_dresseur
    ];
    if(insert($bdd, "pokemons", $data)) {
        header("location:index.php");exit();
    }
}

require_once '../../views/layouts/header.php';
?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des pokémons</h1>
        <a href="index.php" class="btn btn-primary">Liste des pokémons</a>
    </div>

    <h2 class="text-center">Ajouter un pokémon</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">

        <div class="mb-3">
            <label for="nom" class="from-label">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="niveau" class="from-label">Niveau</label>
            <input type="number" id="niveau" class="form-control" name="niveau" required>
        </div>
        <div class="mb-3">
            <label for="exp_en_cours" class="from-label">EXP en cours</label>
            <input type="number" id="exp_en_cours" class="form-control" name="exp_en_cours" required>
        </div>
        <div class="mb-3">
            <label for="id_dresseur" class="from-label">ID dresseur</label>
            <input type="number" id="id_dresseur" class="form-control" name="id_dresseur" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
        </div>
    </form>

<?php
require_once '../../views/layouts/footer.php';
?>