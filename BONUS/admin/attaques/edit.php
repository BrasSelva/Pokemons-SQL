<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();
$modif = false;
$modif_critique = false;

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    $edit_query = find($bdd, 'attaques', $edit_id);
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
        if (update($bdd, "attaques", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_puissance != $new_puissance) {
        $data = [
            "puissance" => $new_puissance
        ];
        if (update($bdd, "attaques", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_precisions != $new_precisions) {
        $data = [
            "precisions" => $new_precisions
        ];
        if (update($bdd, "attaques", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_description != $new_description) {
        $data = [
            "description" => $new_description
        ];
        if (update($bdd, "attaques", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_id_type != $new_id_type) {
        $data = [
            "id_type" => $new_id_type
        ];
        if (update($bdd, "attaques", $data, $edit_id)){
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
        <h1>Gestion des attaques</h1>
        <a href="index.php" class="btn btn-primary">Liste des attaques</a>
    </div>

    <h2 class="text-center">Modifier l'attaque</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">
        <div class="mb-3">
            <label class="form-label" for="nom">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" value="<?=$edit_query[0]['nom'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="puissance">Puissance</label>
            <input type="number" id="puissance" class="form-control" name="puissance" value="<?=$edit_query[0]['puissance'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="precisions">Précision</label>
            <input type="number" id="precisions" class="form-control" name="precisions" value="<?=$edit_query[0]['precisions'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <input type="text" id="description" class="form-control" name="description" value="<?=$edit_query[0]['description'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="id_type">ID type</label>
            <input type="number" id="id_type" class="form-control" name="id_type" value="<?=$edit_query[0]['id_type'];?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Modifier</button>
    </form>

<?php require_once '../../views/layouts/footer.php'; ?>