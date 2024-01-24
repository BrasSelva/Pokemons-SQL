<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();
$modif = false;
$modif_critique = false;

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    $edit_query = find($bdd, 'types', $edit_id);
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
        if (update($bdd, "types", $data, $edit_id)){
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
        <h1>Gestion des types</h1>
        <a href="index.php" class="btn btn-primary">Liste des types</a>
    </div>

    <h2 class="text-center">Modifier le type</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">
        <div class="mb-3">
            <label class="form-label" for="nom">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" value="<?=$edit_query[0]['nom'];?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Modifier</button>
    </form>

<?php require_once '../../views/layouts/footer.php'; ?>