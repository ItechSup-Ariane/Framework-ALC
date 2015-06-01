<?php

namespace FrameworkWidget\Widgets\WidgetsText;

use FrameworkWidget\Widgets\WidgetText;
use FrameworkWidget\Validateurs\ValidateurText\ValidateurTel;

class WidgetTel extends WidgetText {
    
    public function __construct($pName, $pLabel, $pValue=null){
        parent::__construct($pName, $pLabel, $pValue, new ValidateurTel()); 
    }
}
