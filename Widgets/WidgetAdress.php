<?php

namespace FrameworkWidget\Widgets;

use FrameworkWidget\Widgets\WidgetContainer;
use FrameworkWidget\Widgets\WidgetText;
use FrameworkWidget\Validateurs\ValidateurText;
use FrameworkWidget\Validateurs\ValidateurConcordance;
use FrameworkWidget\ArrayDeclare;

use \Exception;

class WidgetAdress extends WidgetContainer {
    
    private $tableauCPVille; // = ArrayDeclare::CPVille();
    
    function __construct($pName, $pLabel=null) {
        
        $tableauCPVille = ArrayDeclare::CPCity();
        $validateur = new ValidateurConcordance($tableauCPVille, 
                "Le code postale n'est pas reconnu", "Le couple code postale ville est invalide");
        
        parent::__construct($pName, $pLabel, $validateur); 
        
        $widgetLine1 = new WidgetText("Ligne1", "Ligne 1 :", null, new ValidateurText("^.{0,256}$", "La ligne 1 de l'adresse ne peut contenir que 256 caractères"));
        $widgetLine2 = new WidgetText("Ligne2", "Ligne 2 :", null, new ValidateurText("^.{0,256}$", "La ligne 2 de l'adresse ne peut contenir que 256 caractères"));
        
        $widgetCP = new WidgetText("Code postale", "Code postale :", null, new ValidateurText("^[]{0,256}$", "La ligne 1 de l'adresse ne peut contenir que 256 caractères"));
        $widgetCity = new WidgetText("Ville", "Ville :", null, new ValidateurText("^.{0,256}$", "La ligne 1 de l'adresse ne peut contenir que 256 caractères"));
        
        $this->add($widgetLine1);
        $this->add($widgetLine2);
        $this->add($widgetCP);
        $this->add($widgetCity);

    }
    
    public function isValid() {
        foreach($this->listWidget as $w)
        {
            $w->isValid();
        }
        try{
            $valid = $this->getValidateur();
            $valid->isValid($this->value);
        }catch(Exception $ex)
        {
            $this->error[$this->name] = $ex->getMessage();
        }
    }
    
    
    
    
}
