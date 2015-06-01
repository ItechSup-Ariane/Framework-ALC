<?php

namespace FrameworkWidget\Widgets;

abstract class Widget {
    //put your code here
    
    protected $validateur;
    protected $name;
    protected $label;
    protected $value;
    protected $error = array();

    
    // <editor-fold defaultstate="collapsed" desc="Methodes">
    
    public abstract function isValid();
    public abstract function render();
    public abstract function setValue($pValue);
    public abstract function getValue();
    
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Getters Setters">
    
    public function getValidateur()
    {
        return $this->validateur;
    }
    public function setValidateur($pvalidateur)
    {
        $this->validateur = $pvalidateur;
    }
    
    public function getLabel()
    {
        return $this->label;
    }
    public function setLabel($pLabel)
    {
        $this->label = $pLabel;
    }
    
    public function getName()
    {
        return $this->name;
    }
    public function setName($pName)
    {
        $this->name = $pName;
    }
    
    // </editor-fold>
   
}
