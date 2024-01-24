<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

$bdd = CONNECT_DB();
$modif = false;
$modif_critique = false;

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    $edit_query = find($bdd, 'pokemons', $edit_id);
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
        if (update($bdd, "pokemons", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_niveau != $new_niveau) {
        $data = [
            "niveau" => $new_niveau
        ];
        if (update($bdd, "pokemons", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_exp_en_cours != $new_exp_en_cours) {
        $data = [
            "exp_en_cours" => $new_exp_en_cours
        ];
        if (update($bdd, "pokemons", $data, $edit_id)){
            $modif = true;
        } else{
            $modif_critique = true;
        }
    }
    if($old_id_dresseur != $new_id_dresseur) {
        $data = [
            "id_dresseur" => $new_id_dresseur
        ];
        if (update($bdd, "pokemons", $data, $edit_id)){
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
        <h1>Gestion des pokémons</h1>
        <a href="index.php" class="btn btn-primary">Liste des pokémons</a>
    </div>

    <h2 class="text-center">Modifier le pokémon</h2>

    <form action="" method="post" enctype="multipart/form-data" class="mt-3">
        <div class="mb-3">
            <label class="form-label" for="nom">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" value="<?=$edit_query[0]['nom'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="niveau">Niveau</label>
            <input type="number" id="niveau" class="form-control" name="niveau" value="<?=$edit_query[0]['niveau'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="exp_en_cours">EXP en cours</label>
            <input type="number" id="exp_en_cours" class="form-control" name="exp_en_cours" value="<?=$edit_query[0]['exp_en_cours'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="id_dresseur">ID dresseur</label>
            <input type="number" id="id_dresseur" class="form-control" name="id_dresseur" value="<?=$edit_query[0]['id_dresseur'];?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Modifier</button>
    </form>

<?php require_once '../../views/layouts/footer.php'; ?>