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

use Ahjob\Demo\Models\CommonType;
use Ahjob\Demo\Models\Propel\Base\CommonTypeForPropelQuery;
use Ahjob\Demo\Service\Demo2Service;
use Ahjob\Demo\Service\DemoService;
use Doctrine\ORM\EntityManager;
use Propel\Runtime\ServiceContainer\ServiceContainerInterface;
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
 * @property EntityManager $doctrine
 * @property ServiceContainerInterface $propel
 * @property $eloquent
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

    public function doctrine(Request $request, Response $response, array $args): ResponseInterface
    {
        $t = $this->doctrine->getRepository('Main:CommonTypeForDoctrine')
            ->find(1);

        $response->write(sprintf("Hello {$t->getTypeName()}, from doctrine"));
        return $response;
    }

    public function propel(Request $request, Response $response, array $args): ResponseInterface
    {
        $propel = $this->propel;
        $t = CommonTypeForPropelQuery::create()
            ->findOneByTypeId(1);
        $response->write(sprintf("Hello {$t->getTypeName()}, from propel"));
        return $response;
    }

    public function eloquent(Request $request, Response $response, array $args): ResponseInterface
    {
        $eloquent = $this->eloquent;
        $t = CommonType::query()->where("type_id", 1)->first();
        $response->write("Hello {$t->type_name}, from eloquent");
        return $response;
    }
    
    public function __get($name)
    {
        return $this->ci->get($name);
    }
}