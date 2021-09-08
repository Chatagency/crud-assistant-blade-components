<?php

use Chatagency\CrudAssistantBladeComponents\CrudAssistantBladeComponents;
use Chatagency\CrudAssistantBladeComponents\ViewTemplate;

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

if(!function_exists('makeCACTemplate')) {
    function makeCACTemplate(string $name, array $params)
    {
        return ViewTemplate::make($params)
            ->settype($name);
    }
}
