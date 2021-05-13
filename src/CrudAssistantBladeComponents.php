<?php

namespace Chatagency\CrudAssistantBladeComponents;

use Chatagency\CrudAssistant\DataContainer;

/**
 * Crud Assistant Blade Components.
 */
class CrudAssistantBladeComponents
{
    /**
     * Default theme
     *
     * @var string
     */
    protected $defaultTheme = 'bootstrap-4';
    
    /**
     * Package Namespace.
     *
     * @var string
     */
    protected $namespace = 'crud-assistant-blade-components';

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
        $this->type = $type ?? config($this->namespace.'.theme') ?? $this->defaultTheme;

        return $this;
    }
    
    /**
     * Static make method
     *
     * @return static
     */
    public static function make(...$args)
    {
        return new static(...$args);
    }

    /**
     * Returns DataContainer instance
     *
     * @param array $params
     * @return C
     */
    public function container(array $params = [])
    {
        return new DataContainer($params);
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
     * Returns component path
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
     * Returns input path
     *
     * @param string $input
     * 
     * @return string
     */
    public function input(string $input)
    {
        return $this->compose(true).$input;
    }

    /**
     * Returns partial path
     *
     * @param string $partial
     * 
     * @return string
     */
    public function partial(string $partial)
    {
        return $this->compose(false, true).$partial;
    }

    /**
     * Returns component blade path
     * for the component directive.
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
     * Returns input blade path.
     * for the input directive
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
     * @return string
     */
    public function base()
    {
        return $this->getNamespace().'::';
    }

    /**
     * Returns theme path
     *
     * @param string $type
     * 
     * @return string
     */
    public function theme(string $type = null)
    {
        return $this->base().'.'. ($type ?? $this->type);
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
        $path = $this->theme();

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

    /**
     * Wraps string in single quotes.
     *
     * @param string $string
     * 
     * @return string
     */
    public function wrapInQuotes(string $string)
    {
        return "'".$string."'";
    }

    public function trimQuotes($string)
    {
        return trim($string, '\'"');
    }

}
