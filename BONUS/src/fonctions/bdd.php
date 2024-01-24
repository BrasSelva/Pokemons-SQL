<?php

function findAll($bdd, String $table) {
    $query = "SELECT * FROM $table";

    return $bdd->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function find($bdd, String $table, Int $id) {
    $sql = "SELECT * FROM $table WHERE id = :id";

    $query = $bdd->prepare($sql);
    $query->bindValue("id", $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function findWhere($bdd, String $table, $data) {

    $sqlFields = [];
    foreach ($data as $key => $value) {
        $sqlFields[] = "$key = :$key";
    }

    $sql = "SELECT * FROM $table WHERE " . implode(' AND ', $sqlFields) . ";";
    $query = $bdd->prepare($sql);

    foreach ($data as $key => $value) {
        $query->bindValue($key, $value, PDO::PARAM_STR);
    }

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function findWhereOrderBy($bdd, String $table, $data, $orderBy) {

    $sqlFields = [];
    foreach ($data as $key => $value) {
        $sqlFields[] = "$key = :$key";
    }

    $sql = "SELECT * FROM $table WHERE " . implode(' AND ', $sqlFields) . " ORDER BY " . $orderBy . ";";
    $query = $bdd->prepare($sql);

    foreach ($data as $key => $value) {
        $query->bindValue($key, $value, PDO::PARAM_STR);
    }

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insert($bdd, string $table, array $data):bool {

    $sqlFields = [];
    foreach ($data as $key => $value) {
        $sqlFields[] = "$key = :$key";
    }

    $query = $bdd->prepare("INSERT INTO $table SET " . implode(', ', $sqlFields) . ";");

    return $query->execute($data);
}

function update($bdd, string $table, array $data, int $id) {
    $sqlFields = [];
    foreach ($data as $key => $value){
        $sqlFields[] = "$key = :$key";
    }
    $query = $bdd->prepare("UPDATE $table SET " . implode(', ', $sqlFields) .
        " WHERE id = :id");

    return $query->execute(array_merge($data, ['id' => $id]));
}

function delete($bdd, string $table, string $id):bool {
    $sql = "DELETE FROM $table WHERE id = :id";
    $query = $bdd->prepare($sql);
    $query->bindValue("id", $id, PDO::PARAM_INT);

    return $query->execute();
}
