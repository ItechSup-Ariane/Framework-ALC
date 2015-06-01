<?php

namespace FrameworkWidget\Widgets\WidgetsText;

use FrameworkWidget\Widgets\WidgetText;
use FrameworkWidget\Validateurs\ValidateurText\ValidateurEmail;

class WidgetEmail extends WidgetText {    
    
    public function __construct($pName, $pLabel, $pValue = null){
            parent::__construct($pName, $pLabel, $pValue, new ValidateurEmail()); 
    }
}