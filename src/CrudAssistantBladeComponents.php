<?php

namespace Chatagency\CrudAssistantBladeComponents;

/**
 * Crud Assistant Blade Components.
 */
class CrudAssistantBladeComponents
{
    /**
     * Package Namespace.
     *
     * @var string
     */
    protected $namespace = 'crud-assistant-blade-components';

    /**
     * Vendor Namespace.
     *
     * @var string
     */
    protected $vendorNamespace = 'vendor';

    /**
     * Input path.
     *
     * @var string
     */
    protected $inputPath = 'inputs';

    /**
     * Template type.
     *
     * @var string
     */
    protected $type;
    
    /**
     * Construct
     * 
     * @param string $type
     * 
     * @return self
     */
    public function __construct(string $type = null)
    {
        $this->type = $type ?? config($this->namespace.'.type') ?? 'bootstrap';

        return $this;
    }
    
    /**
     * Undocumented function
     *
     * @return static
     */
    public static function make(...$args)
    {
        return new static(...$args);
    }
    
    /**
     * Get Namespace.
     *
     * @return  string
     */ 
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Returns component blade path.
     *
     * @param string $component
     * 
     * @return string
     */
    public function component(string $component)
    {
        return $this->compose().$component;
    }

    /**
     * Returns input blade path
     *
     * @param string $component
     * 
     * @return string
     */
    public function input(string $component)
    {
        return $this->compose(true).$component;
    }

    /**
     * Returns template type
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Composes the blade path
     *
     * @param boolean $input
     * @return string
     */
    public function compose($input = false)
    {
        $path = $this->getNamespace()
            .'::'.$this->vendorNamespace
            .'.'.$this->namespace
            .'.'.$this->type;

        If($input) {
            $path .= '.'.$this->inputPath;
        }

        return $path.'.';
    }

}
