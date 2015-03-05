<?php namespace Dowilcox\JsVar\Facades;

use Illuminate\Support\Facades\Facade;

class JsVar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'jsvar';
    }
}