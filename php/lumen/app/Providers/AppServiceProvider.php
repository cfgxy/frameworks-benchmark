<?php

namespace App\Providers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('em', function () {
            $ormConf =
                Setup::createAnnotationMetadataConfiguration(
                    [
                        base_path('app/Models/Doctrine')
                    ],
                    false,
                    null,
                    new \Doctrine\Common\Cache\PhpFileCache(
                        storage_path('framework/cache/doctrine')
                    )
                );
            
            $ormConf->addEntityNamespace('Main', 'App\Models\Doctrine');
            
            return EntityManager::create(
                [
                    'driver'    => 'pdo_mysql',
                    'user'      => env('DB_USERNAME', 'root'),
                    'dbname'    => env('DB_DATABASE', 'test'),
                    'url'       => 'mysql://' . env('DB_HOST', 'localhost')
                ],
                $ormConf
            );
        });
        
        $this->app->singleton('propel', function () {
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
        });
    }
}
