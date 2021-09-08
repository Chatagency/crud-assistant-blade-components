<?php

namespace Chatagency\CrudAssistantBladeComponents;

use Chatagency\CrudAssistant\DataContainer;

class ViewTemplate extends DataContainer
{
    /**
     * Sets template type.
     *
     * @param string $type
     * 
     * @return self
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns template type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Returns template attributes.
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes ?? [];
    }

    /**
     * Returns specific attribute.
     *
     * @param string $name
     */
    public function getAttribute(string $name)
    {
        return $this->getAttributes()[$name] ?? null;
    }
    
    /**
     * Sets specific attribute.
     *
     * @param string $name
     * @param $value
     * 
     * @return self
     */
    public function setAttribute(string $name, $value)
    {
        $oldAttributes = $this->getAttributes();
        $oldAttributes[$name] = $value;
        $this->attributes = $oldAttributes;

        return $this;
    }
    
    /**
     * Sets attribute array
     *
     * @param array $attributes
     * 
     * @return self
     */
    public function setAttributes(array $attributes)
    {
        // $this->attributes = array_merge($this->getAttributes(), $attributes);
        
        foreach($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }

        return $this;
    }
}
