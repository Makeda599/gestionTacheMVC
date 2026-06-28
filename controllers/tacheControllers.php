<?php
require_once(ROOT."models/tachesModels.php");

$listeTache = function(){
    $taches = getAllTache();
    // dd($taches);
    loadView("taches/listeTaches",compact("taches"),"base");
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
$pages = [
    "listeTaches" => $listeTache,
    "ajout" => $ajout,
    "detail" => $detail,
    "supprimer" => $supTache,
    "update" => $updateTache,
];
$page = $_REQUEST["page"] ?? "listeTaches";
if(array_key_exists($page,$pages)){
    $pages[$page]();
}else{
    echo "page introuvable";
    exit();
}