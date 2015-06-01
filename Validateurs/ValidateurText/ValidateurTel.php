<?php
namespace FrameworkWidget\Validateurs\ValidateurText;

use FrameworkWidget\Validateurs\ValidateurText;

class ValidateurTel extends ValidateurText {
    
    public function __construct(){
        parent::__construct("^0[1-9](([. -]?)[0-9]{2}){4}$", "Le format du tel n'est pas reconnu"); 
    }
}
