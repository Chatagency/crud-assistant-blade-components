<?php

namespace Chatagency\CrudAssistantBladeComponents;

use Chatagency\CrudAssistant\DataContainer;

class ViewTemplate extends DataContainer
{
    public function setAttributes(array $attributes)
    {
        $oldAttributes = $this->attributes ?? [];

        $this->attributes = array_merge($oldAttributes, $attributes);

        return $this;
    }
}
