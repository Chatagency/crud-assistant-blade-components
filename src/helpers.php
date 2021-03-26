<?php

use Chatagency\CrudAssistantBladeComponents\CrudAssistantBladeComponents;

if(!function_exists('CACHelper')) {
    function CACHelper()
    {
        
        return CrudAssistantBladeComponents::make();
    }
}
