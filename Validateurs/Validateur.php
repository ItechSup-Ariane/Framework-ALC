<?php
namespace FrameworkWidget\Validateurs;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validateur
 *
 * @author utilisateur
 */
abstract class Validateur {
    
    protected $messageError;
    
    public abstract function isValid($pValue, $pKey = null);
    
    
    public function getMessage()
    {
        return $this->messageError;
    }
    
}
