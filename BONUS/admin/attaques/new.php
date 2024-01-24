<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";
$bdd = CONNECT_DB();

if(isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $puissance = $_POST["puissance"];
    $precisions = $_POST["precisions"];
    $description = $_POST["description"];
    $id_type = $_POST["id_type"];

    $data = [
        "nom" => $nom,
        "puissance" => $puissance,
        "precisions" => $precisions,
        "description" => $description,
        "id_type" => $id_type
    ];
    if(insert($bdd, "attaques", $data)) {
        header("location:index.php");exit();
    }
}

require_once '../../views/layouts/header.php';
?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des attaques</h1>
        <a href="index.php" class="btn btn-primary">Liste des attaques</a>
    </div>

    <h2 class="text-center">Ajouter une attaque</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">

        <div class="mb-3">
            <label for="nom" class="from-label">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="puissance" class="from-label">Puissance</label>
            <input type="number" id="puissance" class="form-control" name="puissance" required>
        </div>
        <div class="mb-3">
            <label for="precisions" class="from-label">Précision</label>
            <input type="number" id="precisions" class="form-control" name="precisions" required>
        </div>
        <div class="mb-3">
            <label for="description" class="from-label">Description</label>
            <input type="text" id="description" class="form-control" name="description" required>
        </div>
        <div class="mb-3">
            <label for="id_type" class="from-label">ID type</label>
            <input type="number" id="id_type" class="form-control" name="id_type" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
        </div>
    </form>

<?php
require_once '../../views/layouts/footer.php';
?>