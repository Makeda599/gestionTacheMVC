<?php
function validate(array $data,array $rules) {
    $errors = [];
    foreach ($rules as $key => $rule ){

    $value = $data[$key] ?? null;
    
    foreach($rule as $uneRegle){
        if($uneRegle == "obligatoire" && empty($value)){
            $errors[$key] ="Le champ ".$key." est obligatoire";
            break;
        }
    }
  
    }
    return $errors;
}
