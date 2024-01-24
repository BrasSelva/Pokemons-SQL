<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";
$bdd = CONNECT_DB();

if(isset($_POST["submit"])) {
    $nom = $_POST["nom"];

    $data = [
        "nom" => $nom
    ];
    if(insert($bdd, "types", $data)) {
        header("location:index.php");exit();
    }
}

require_once '../../views/layouts/header.php';
?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des types</h1>
        <a href="index.php" class="btn btn-primary">Liste des types</a>
    </div>

    <h2 class="text-center">Ajouter un type</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">

        <div class="mb-3">
            <label for="nom" class="from-label">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
        </div>
    </form>

<?php
require_once '../../views/layouts/footer.php';
?>