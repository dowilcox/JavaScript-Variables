<?php namespace Dowilcox\JsVar;

use Dowilcox\JsVar\Interfaces\JsVarInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class JsVar implements JsVarInterface, Arrayable, Jsonable
{

    /**
     * The variables to be put into JavaScript.
     *
     * @var array
     */
    protected $variables = [];

    /**
     * The namespace for the variables in JavaScript.
     * Ex: window.$namespace = {};
     *
     * @var string
     */
    protected $namespace;

    /**
     * Start class.
     *
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * Add a value to the array.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function add($key, $value)
    {
        array_set($this->variables, $key, $value);

        return $this;
    }

    /**
     * Remove a key from the array.
     *
     * @param $key
     * @return $this
     */
    public function remove($key)
    {
        array_forget($this->variables, $key);

        return $this;
    }

    /**
     * Dump the variables to javascript.
     *
     * @return string
     */
    public function dump()
    {
        return "window.{$this->namespace} = window.{$this->namespace} || {$this->toJson()};";
    }

    /**
     * Dump the array to json.
     *
     * @param int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->variables, $options);
    }

    /**
     * Return the variables array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->variables;
    }

}