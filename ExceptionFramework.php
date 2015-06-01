<?php

namespace FrameworkWidget;

use \Exception;


class ExceptionFramework extends Exception{
    private $message;
    function __construct($message) {
        $this->message = $message;
    }

}
