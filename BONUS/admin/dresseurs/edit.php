<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();
$modif = false;
$modif_critique = false;

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    $edit_query = find($bdd, 'dresseurs', $edit_id);
} else {
    header('location:index.php');
};

if (isset($_POST["submit"])) {
    // Boucle pour obtenir les anciennes données
    foreach ($edit_query[0] as $field => $value){
        ${'old_' . $field} = $value;
    }
    // Boucle pour obtenir les nouvelles données
    foreach ($_POST as $field => $value){
        ${'new_' . $field} = $value;
    }

    if($old_nom != $new_nom) {
        $data = [
                "nom" => $new_nom
        ];
        if (update($bdd, "dresseurs", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_age != $new_age) {
        $data = [
            "age" => $new_age
        ];
        if (update($bdd, "dresseurs", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_genre != $new_genre) {
        $data = [
            "genre" => $new_genre
        ];
        if (update($bdd, "dresseurs", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    
    if($modif_critique) {
        header("location:edit.php?id=" . $edit_id);exit();
    } elseif($modif) {
        header("location:index.php");exit();
    }

}

require_once '../../views/layouts/header.php';
?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 underline">
        <h1>Gestion des dresseurs</h1>
        <a href="index.php" class="btn btn-primary">Liste des dresseurs</a>
    </div>

    <h2 class="text-center">Modifier le dresseur</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">
        <div class="mb-3">
            <label class="form-label" for="nom">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" value="<?=$edit_query[0]['nom'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="age">Age</label>
            <input type="number" id="age" class="form-control" name="age" value="<?=$edit_query[0]['age'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="genre">Genre</label>
            <input type="text" id="genre" class="form-control" name="genre" value="<?=$edit_query[0]['genre'];?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Modifier</button>
    </form>

<?php require_once '../../views/layouts/footer.php'; ?>