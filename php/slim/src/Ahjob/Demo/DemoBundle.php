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

namespace Ahjob\Demo;


use Ahjob\Common\Bundle;
use Ahjob\Common\Attrs;
use Ahjob\Demo\Service\Demo2Service;
use Ahjob\Demo\Service\DemoService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

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

    #[Attrs\Service('propel')]
    public function providePropel()
    {
        $serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
        $serviceContainer->checkVersion('2.0.0-dev');
        $serviceContainer->setAdapterClass('default', 'mysql');
        $manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
        $manager->setConfiguration(array (
            'dsn' => sprintf(
                'mysql:host=%s;port=3306;dbname=%s',
                env('DB_HOST', 'localhost'),
                env('DB_DATABASE', 'test')
            ),
            'user' => env('DB_USERNAME', 'root'),
            'password' => '',
            'settings' =>
                array (
                    'charset' => 'utf8',
                    'queries' =>
                        array (
                        ),
                ),
            'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
            'model_paths' =>
                array (
                    'src',
                    'app',
                    'vendor',
                ),
        ));
        $manager->setName('default');
        $serviceContainer->setConnectionManager('default', $manager);
        $serviceContainer->setDefaultDatasource('default');

        return $serviceContainer;
    }

    #[Attrs\Service('doctrine')]
    public function provideDoctrine()
    {
        $ormConf =
            Setup::createAnnotationMetadataConfiguration(
                [
                    APP_ROOT . '/src/Ahjob/Demo/Models/Doctrine',
                ],
                false,
                null,
                new \Doctrine\Common\Cache\PhpFileCache(
                    APP_ROOT . '/storage/framework/cache/doctrine',
                )
            );

        $ormConf->addEntityNamespace('Main', 'Ahjob\Demo\Models\Doctrine');

        return EntityManager::create(
            [
                'driver'    => 'pdo_mysql',
                'user'      => env('DB_USERNAME', 'root'),
                'dbname'    => env('DB_DATABASE', 'test'),
                'url'       => 'mysql://' . env('DB_HOST', 'localhost')
            ],
            $ormConf
        );
    }
}