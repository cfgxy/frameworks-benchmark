<?php


namespace Ahjob\Common;


use Ahjob\Common\Attrs\Service;
use Illuminate\Container\Container;
use ReflectionMethod;
use Slim\App;

abstract class Bundle
{
    /** @var App */
    protected $app;
    
    /** @var Container */
    protected $ci;
    
    /** @var \ReflectionObject */
    protected $rfl;
    
    public function register(App $app)
    {
        $this->app = $app;
        $this->ci = $app->getContainer();
        
        $this->rfl = new \ReflectionObject($this);
        
        $this->registerConfigs();
        $this->registerServices();
        $this->registerRoutes();
    }
    
    protected function registerConfigs()
    {
        
    }

    protected function registerServices()
    {
        $methods = $this->rfl->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $method) {
            $attrs = $method->getAttributes(Service::class);
            if (isset($attrs[0])) {
                /** @var Service $attr */
                $attr = $attrs[0]->newInstance();
                $this->ci->bindIf(
                    $attr->name,
                    fn() => $this->{$method->getName()}(),
                    $attr->singleton
                );
            }
        }
    }

    protected function registerRoutes()
    {
        $dir = dirname($this->rfl->getFileName());
        
        if (is_file("$dir/routes.php")) {
            $app = $this->app;
            require_once "$dir/routes.php";
        }
    }
}