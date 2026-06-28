<?php

function routes(){
    return [
        "taches" => ROOT."controllers/tacheControllers.php",
    ];
}

function gestionController(){
    $routes = routes();
    $controller = $_REQUEST["controller"] ?? "taches";    
    if(array_key_exists($controller,$routes) ){
            require_once($routes[$controller]);
    };
}