<?php

class JsVarTest extends PHPUnit_Framework_TestCase
{
    protected $jsVar;

    public function setup()
    {
        $this->jsVar = new \Dowilcox\JsVar\JsVar('tests');
    }

    /** @test */
    public function it_outputs_array()
    {
        $this->assertEquals([], $this->jsVar->toArray());
    }

    /** @test */
    public function it_outputs_json()
    {
        $this->assertEquals('[]', $this->jsVar->toJson());
    }

    /** @test */
    public function it_adds_new_key_value_pair()
    {
        $this->assertEquals(['user' => 'test'], $this->jsVar->add('user', 'test')->toArray());
    }

    /** @test */
    public function it_dumps_to_javascript()
    {
        $this->jsVar->add('user', 'test');
        $this->assertEquals('window.tests = window.tests || {"user":"test"};', $this->jsVar->dump());
    }

    /** @test */
    public function it_removes_key_value_pair()
    {
        $this->jsVar->add('user', 'test');
        $this->assertEquals([], $this->jsVar->remove('user')->toArray());
    }
}