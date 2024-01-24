<?php
require_once "../../src/db_connexion.php";
require_once "../../src/fonctions/bdd.php";

if (isset($_GET['id'])){
    $bdd = CONNECT_DB();
    delete($bdd, 'pokemons', $_GET['id']);
}

header('location:index.php');