<?php

namespace FrameworkWidget\Validateurs;

use FrameworkWidget\Validateurs\Validateur;
use \Exception;

class ValidateurConcordance extends Validateur{
    private $tab = array();
    private $messageCleNonReconnu="La clé n'est pas reconnue";    
    private $messageInvalideCleValue="Le couple clé/value n'est pas reconnu";
    
 
    public function __construct($pArray, $pMessageCleNonReconnu=null, $pMessageInvalideCleValue=null){
        $this->tab = $pArray;
        if ($pMessageCleNonReconnu != null) {
            $this->messageCleNonReconnu = $pMessageCleNonReconnu;
        }
        if ($pMessageInvalideCleValue != null) {
            $this->messageInvalideCleValue = $pMessageInvalideCleValue;
        }
    }

   public function isValid($pValue, $pKey = null) {
        try{
            if(!array_key_exists($pKey , $this->tab))
            {
                throw new ExceptionFramework($this->messageCleNonReconnu);
            }elseif($this->tab[$pKey] == $pValue)
            {
                throw new ExceptionFramework($this->messageInvalideCleValue);
            }
        }catch(Exception $ex)
        {
            throw $ex;
        }
    }
    
    

}
