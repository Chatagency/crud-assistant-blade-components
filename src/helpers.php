<?php

use Chatagency\CrudAssistant\DataContainer;
use Chatagency\CrudAssistantBladeComponents\CrudAssistantBladeComponents;

if(!function_exists('CACHelper')) {
    function CACHelper()
    {
        return CrudAssistantBladeComponents::make();
    }
}

if(!function_exists('isCACTemplate')) {
    function isCACTemplate($template)
    {
        return is_a($template, DataContainer::class) 
            && isset($template->template) 
            && $template->template;
    }
}