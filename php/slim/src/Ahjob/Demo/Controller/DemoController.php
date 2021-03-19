<?php
/**
 * Copyright (c) 2021 Gu Xiaoyu
 * Frameworks-Benchmark is licensed under Mulan PSL v2.
 * You can use this software according to the terms and conditions of the Mulan PSL v2.
 * You may obtain a copy of Mulan PSL v2 at:
 *          http://license.coscl.org.cn/MulanPSL2
 * THIS SOFTWARE IS PROVIDED ON AN "AS IS" BASIS, WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO NON-INFRINGEMENT, MERCHANTABILITY OR FIT FOR A PARTICULAR PURPOSE.
 * See the Mulan PSL v2 for more details.
 */

namespace Ahjob\Demo\Controller;

use Ahjob\Demo\Service\Demo2Service;
use Ahjob\Demo\Service\DemoService;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest as Request;

/**
 * Class DemoController
 * @package Ahjob\Demo\Controller
 *
 * @property DemoService $demo
 * @property Demo2Service $demo2
 */
class DemoController
{
    /** @var ContainerInterface */
    protected $ci;

    public function __construct(ContainerInterface $container) {
        $this->ci = $container;
    }
    
    public function __invoke()
    {
        return $this->execute(... func_get_args());
    }

    public function execute(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->demo->muhaha();
        $this->demo->muhaha();
        $this->demo2->muhaha();
        $this->demo2->muhaha();

        return $response;
    }

    public function hello(Request $request, Response $response, array $args): ResponseInterface
    {
        $response->write('Hello World');
        return $response;
    }
    
    public function __get($name)
    {
        if ($this->ci->has($name)) {
            return $this->ci->get($name);
        }
        
        return null;
    }
}