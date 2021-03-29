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
     * Component path.
     *
     * @var string
     */
    protected $componentPath = 'components';

    /**
     * Input path.
     *
     * @var string
     */
    protected $inputPath = 'inputs';

    /**
     * Input path.
     *
     * @var string
     */
    protected $partialsPath = 'partials';

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

    public function component(string $component)
    {
        return $this->compose().$component;
    }

    public function input(string $component)
    {
        return $this->compose(true).$component;
    }

    public function partial(string $partial)
    {
        return $this->compose(false, true).$partial;
    }

    /**
     * Returns component blade path.
     *
     * @param string $component
     * 
     * @return string
     */
    public function rawComponent(string $component)
    {
        $base = $this->compose();

        if($this->isExpression($component)) {
            return $this->wrapInQuotes($base).'.'.$component;
        }

        return $this->wrapInQuotes($base.$this->trimQuotes($component));
    }

    /**
     * Returns input blade path
     *
     * @param string $component
     * 
     * @return string
     */
    public function rawInput(string $component)
    {
        $base = $this->compose(true);
        
        if($this->isExpression($component)) {
            return $this->wrapInQuotes($base).'.'.$component;
        }

        return $this->wrapInQuotes($base.$this->trimQuotes($component));
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
     * Returns views base path
     *
     * @return void
     */
    public function base()
    {
        return $this->getNamespace()
            .'::'.$this->vendorNamespace
            .'.'.$this->namespace;
    }

    /**
     * Composes the blade path
     *
     * @param boolean $input
     * 
     * @return string
     */
    public function compose($input = false, $partial = false)
    {
        $path = $this->base()
            .'.'.$this->type;

        if(!$input && !$partial) {
            $path .= '.'.$this->componentPath;
        }

        If($input) {
            $path .= '.'.$this->inputPath;
        }

        If($partial) {
            $path .= '.'.$this->partialsPath;
        }

        return $path.'.';
    }

    /**
     * Parses directive params
     *
     * @param string $expression 
     * 
     * @return string
     */
    public function parse(string $expression)
    {
        $output = [];
        $parsed = array_map(function ($item) {
            return trim($item);
        }, explode(',', $expression));

        $output['component'] = array_shift($parsed);
        $output['params'] = implode(",", $parsed);

        return $output;
    }

    /**
     * Checks if string is variable
     *
     * @param string $variable
     * 
     * @return boolean
     */
    protected function isExpression(string $string)
    {
        return substr($string, 0, 1 ) !== "'" && substr($string, 0, 1 ) !== '"';
    }

    public function wrapInQuotes(string $string)
    {
        return "'".$string."'";
    }

    public function trimQuotes($string)
    {
        return trim($string, '\'"');
    }

}
