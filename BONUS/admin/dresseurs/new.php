<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";
$bdd = CONNECT_DB();

if(isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $age = $_POST["age"];
    $genre = $_POST["genre"];

    $data = [
        "nom" => $nom,
        "age" => $age,
        "genre" => $genre
    ];
    if(insert($bdd, "dresseurs", $data)) {
        header("location:index.php");exit();
    }
}

require_once '../../views/layouts/header.php';
?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des dresseurs</h1>
        <a href="index.php" class="btn btn-primary">Liste des dresseurs</a>
    </div>

    <h2 class="text-center">Ajouter un dresseur</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">

        <div class="mb-3">
            <label for="nom" class="from-label">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="age" class="from-label">Age</label>
            <input type="number" id="age" class="form-control" name="age" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="from-label">Genre</label>
            <input type="text" id="genre" class="form-control" name="genre" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
        </div>
    </form>

<?php
require_once '../../views/layouts/footer.php';
?>