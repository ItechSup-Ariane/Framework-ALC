<?php

namespace FrameworkWidget\Validateurs;

use FrameworkWidget\Validateurs\Validateur;
use \Exception;

class ValidateurText extends Validateur {
    protected $regex;
    
    public function __construct($pRegex, $pMessageError){
        $this->SetRegex($pRegex);
        $this->messageError = $pMessageError;
    }
    
    
    public function isValid($pValue, $pKey = null) {
        try{
            if(preg_match("'".$this->regex."'", $pValue)==0)
            {
                throw new ExceptionFramework($this->messageError);
            }
        }catch(Exception $ex)
        {
            throw $ex;
        }
    }
    
    public function getRegex()
    {
        return $this->regex;
    }
    public function setRegex($pRegex)
    {
        $this->regex = $pRegex;
    }
}
