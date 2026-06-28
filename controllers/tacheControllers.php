<?php
require_once(ROOT."models/tachesModels.php");

$listeTache = function(){
    $taches = getAllTache();
    // dd($taches);
    loadView("taches/listeTaches",compact("taches"),"base");
};

$pages = [
    "listeTaches" => $listeTache,
];
$page = $_REQUEST["page"] ?? "listeTaches";
if(array_key_exists($page,$pages)){
    $pages[$page]();
}else{
    echo "page introuvable";
    exit();
}