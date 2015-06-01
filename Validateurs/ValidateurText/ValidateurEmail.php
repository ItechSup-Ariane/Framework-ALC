<?php
namespace FrameworkWidget\Validateurs\ValidateurText;
use FrameworkWidget\Validateurs\ValidateurText;

class ValidateurEmail extends ValidateurText {
    
    public function __construct(){
        parent::__construct("^([a-zA-Z0-9_.+])+@([a-zA-Z0-9]+\.)+[a-zA-Z]{2,4}$", "L'adresse email n'est pas correct"); 
    }
}
