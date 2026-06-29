<?php
require_once(ROOT."models/tachesModels.php");

$listeTache = function() {
    $limit = 5; 

    $currentPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if ($currentPage < 1) $currentPage = 1;
    $totalTaches = countAllTaches();
    $totalPages = ceil($totalTaches / $limit); 
    if ($currentPage > $totalPages && $totalPages > 0) {
        $currentPage = $totalPages;
    }
    $offset = ($currentPage - 1) * $limit;
    $taches = getPaginatedTaches($offset, $limit);
    loadView("taches/listeTaches", compact("taches", "currentPage", "totalPages"), "base");
};
$ajout = function(){
    $errors=[];
    $save = [];
    if(isset($_REQUEST["envoyer"])){
        $save = $_POST;
        $errors = validateTaches($save);
        if(empty($errors)){
            ajouterTache($save);
            redirectTo("taches","listeTaches");
        }
    }

    loadView("taches/ajoutTaches",compact("errors","save"),"login");
};

$detail = function (){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $tache = getTacheById($id);
        // dd($tache);
    }
    loadView("taches/detail",compact("tache"),"login");
};
$supTache = function(){
    if(isset($_GET["id"])){
    $id = $_GET["id"];
    deleteTache($id);
    }
    redirectTo("taches","listeTaches");

};
$updateTache = function(){
    if(isset($_GET["id"])){
    $id = $_GET["id"];
    updateStatut($id);
    }
    redirectTo("taches","listeTaches");

};
$modifier = function() {
    $errors = [];
    $save = [];
        if (isset($_REQUEST["envoyer"])) {
        $save = $_POST;
        $errors = validateTaches($save);
        
        if (empty($errors)) {
            editTache($save);
            redirectTo("taches", "listeTaches");
        }
    } else {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];
            $save = getTacheById($id);
        }
    }
    loadView("taches/ajoutTaches", compact("errors", "save"), "base");
};
$pages = [
    "listeTaches" => $listeTache,
    "ajout" => $ajout,
    "detail" => $detail,
    "supprimer" => $supTache,
    "update" => $updateTache,
    "modifier"    => $modifier, 
];
$page = $_REQUEST["page"] ?? "listeTaches";
if(array_key_exists($page,$pages)){
    $pages[$page]();
}else{
    echo "page introuvable";
    exit();
}