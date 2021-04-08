<?php

namespace Chatagency\CrudAssistantBladeComponents;

use Chatagency\CrudAssistant\DataContainer;

class ViewTemplate extends DataContainer
{
    public function getAttributes()
    {
        return $this->attributes ?? [];
    }
    
    public function setAttribute(string $name, $value)
    {
        $oldAttributes = $this-> getAttributes();
        $oldAttributes[$name] = $value;
        $this->attributes = $oldAttributes;

        return $this;
    }
    
    public function setAttributes(array $attributes)
    {
        // $this->attributes = array_merge($this->getAttributes(), $attributes);
        
        foreach($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }

        return $this;
    }
}
