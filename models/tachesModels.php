<?php

function ajouterTache(string $nom, string $date, string $description) {
    $sql = "INSERT INTO taches (nom, date_echeance, description, statut) 
            VALUES (:nom, :date, :description, 'en_cours')";
    
    executeUpdate($sql, [
        'nom'         => $nom,
        'date'        => $date, 
        'description' => $description
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