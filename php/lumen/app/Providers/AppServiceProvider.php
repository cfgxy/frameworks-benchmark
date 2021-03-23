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
    }
}
