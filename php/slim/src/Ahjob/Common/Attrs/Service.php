<?php


namespace Ahjob\Common\Attrs;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Service
{
    /** @var string */
    public $name;
    
    /** @var bool */
    public $singleton;
    
    public function __construct($name, $singleton = true)
    {
        $this->name = $name;
        $this->singleton = $singleton;
    }
}