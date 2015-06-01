<?php

namespace FrameworkWidget\Widgets;

use FrameworkWidget\Widgets\Widget;
use FrameworkWidget\Validateurs\Validateur;
use \Exception;

class WidgetContainer extends Widget {
    
    protected $listWidget = array();

    function __construct($pName, $pLabel=null, $pValidateur) {
        $this->name=$pName;
        $this->label=$pLabel;
        $this->SetValidateur($pValidateur);
    }
    
    public function getValue() {
        return $this->value;
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
    
    public function add($pWidget)
    {
        if(!array_key_exists($pWidget->getName() , $this->listWidget))
        {
            $this->listWidget[$pWidget->getName()] = $pWidget;
        }
        else{
            throw new Exception("Le formulaire contient déjà un widget avec le nom ".$pWidget->getName());
        }
    }

    public function render() {
        $s = '<table><tr><td>'.$this->label.'</td></tr>';
        foreach($this->listWidget as $w)
        {
            $s .=  '<tr><td><table><tr><td>'.$w->render().'</td></tr>';
            if(array_key_exists($w->getName() , $this->error)) $s .= '<tr><td style="color: red">'.$this->error[$w->getName()].'</td></tr>';
            $s .= "</table></td></tr>";
        }
        $s .= '</table>';
        return $s;
    }

    public function setValue($pValue) {
        
    }

//put your code here
}
