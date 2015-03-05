<?php namespace Dowilcox\JsVar\Interfaces;

interface JsVarInterface
{

    /**
     * Add a value to the array.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function add($key, $value);

    /**
     * Remove a key from the array.
     *
     * @param $key
     * @return $this
     */
    public function remove($key);

    /**
     * Dump the variables to javascript.
     *
     * @return string
     */
    public function dump();

}