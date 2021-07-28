<?php

use Chatagency\CrudAssistantBladeComponents\CrudAssistantBladeComponents;

if(!function_exists('CACHelper')) {
    function CACHelper($type = null)
    {
        return CrudAssistantBladeComponents::make($type);
    }
}

if(!function_exists('isCACTemplate')) {
    function isCACTemplate($template)
    {
        return CrudAssistantBladeComponents::isTemplate($template);
    }
}
