<?php

namespace Chatagency\CrudAssistantBladeComponents;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Chatagency\CrudAssistantBladeComponents\Skeleton\SkeletonClass
 */
class CrudAssistantBladeComponentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'crud-assistant-blade-components';
    }
}
