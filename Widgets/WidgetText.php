<?php

namespace FrameworkWidget\Widgets;

use FrameworkWidget\Widgets\Widget;
use FrameworkWidget\Validateurs\Validateur;
use \Exception;

class WidgetText extends Widget  {
    
    public function __construct($pName, $pLabel, $pValue, $pValidateur) {
        $this->name=$pName;
        $this->label=$pLabel;
        $this->value=$pValue;
        $this->SetValidateur($pValidateur);
    }
    
    public function isValid() {
        try{
            $valid = $this->getValidateur();
            $valid->isValid($this->value);
        }catch(Exception $ex)
        {
            $this->error[$this->name] = $ex->getMessage();
        }
    }
    
    public function render() {
        $s = '<table><tr><td>'.$this->getLabel().'</td><td><input name="'.$this->name.'" type="text" value="'.$this->getValue().'" ';
        $valid = $this->getValidateur();
        if(!($valid->getRegex() == null || $valid->getRegex() == ''))
        {
            //$s = $s.'pattern="'.$valid->getRegex().'" title="'.$valid->getMessage().'"';
        }
        $s = $s." ></td>";
        if(array_key_exists($this->name , $this->error)) $s .= '<tr><td style="color: red" colspan=2>'.$this->error[$this->name].'</td></tr>';
        $s = $s."</td></tr></table>";
        return $s;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($pValue) {
        $this->value = $pValue;
    }

}
