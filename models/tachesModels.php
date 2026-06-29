<?php

function validateTaches(array $data):array{
    $rules = [
        "nom" => ["obligatoire"],
        "description" => ["obligatoire"],
        "date_echeance" =>  ["obligatoire"],
    ];
    return validate($data,$rules);
}



function ajouterTache(array $data) {
    $sql = "INSERT INTO taches (nom, date_echeance, description, statut) 
            VALUES (:nom, :date_echeance, :description, 'en_cours')";
    
    executeUpdate($sql, [
        'nom'         => $data["nom"],
        'date_echeance'        => $data["date_echeance"], 
        'description' => $data["description"]
    ]);
}

function getAllTache() {
    $sql = "SELECT * FROM taches";
    return executeSelect($sql);
}


function searchTache(int $idSearch) {
    $sql = "SELECT * FROM taches WHERE id = :id";
    $result = executeSelect($sql, ['id' => $idSearch], true);
    
    return $result ? $result : null;
}

function deleteTache(int $idTache) {
    $sql = "DELETE FROM taches WHERE id = :id";
    executeUpdate($sql, ['id' => $idTache]);
}

function getTacheByStatut(string $statut) {
    $sql = "SELECT * FROM taches WHERE statut = :statut";
    return executeSelect($sql, ['statut' => $statut]);
}

function getTacheById(int $id) {
    $sql = "SELECT * FROM taches WHERE id = :id";
    return executeSelect($sql, ['id' => $id],true);
}
function updateStatut(int $id) {
    $sql = "UPDATE taches SET statut = 'termine' WHERE id = :id";
    executeUpdate($sql, ['id' => $id]);
}


function countAllTaches(): int {
    $sql = "SELECT COUNT(*) as total FROM taches";
    $result = executeSelect($sql, [], true);
    return (int)$result['total'];
}

function getPaginatedTaches(int $offset, int $limit): array {
    $sql = "SELECT * FROM taches ORDER BY id DESC LIMIT $offset, $limit";
    return executeSelect($sql);
}

function editTache(array $data) {
    $sql = "UPDATE taches 
            SET nom = :nom, description = :description, date_echeance = :date_echeance 
            WHERE id = :id";
    
    executeUpdate($sql, [
        'nom'           => $data["nom"],
        'description'   => $data["description"],
        'date_echeance' => $data["date_echeance"],
        'id'            => (int)$data["id"]
    ]);
}