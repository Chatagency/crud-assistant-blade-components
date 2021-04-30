<?php

use Chatagency\CrudAssistantBladeComponents\ViewTemplate;
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
        return is_a($template, ViewTemplate::class);
    }
}