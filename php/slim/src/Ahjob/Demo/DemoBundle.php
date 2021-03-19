<?php


namespace Ahjob\Demo;


use Ahjob\Common\Bundle;
use Ahjob\Common\Attrs;
use Ahjob\Demo\Service\Demo2Service;
use Ahjob\Demo\Service\DemoService;

class DemoBundle extends Bundle
{

    #[Attrs\Service('demo', false)]
    public function provideDemoService()
    {
        return new DemoService();
    }
    
    #[Attrs\Service('demo2')]
    public function provideDemo2Service()
    {
        return new Demo2Service();
    }
}