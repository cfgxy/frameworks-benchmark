<?php

use Ahjob\Common\Bundle;

$bundles = [
    'Ahjob\Demo\DemoBundle'
];

foreach ($bundles as $bundleName) {
    if (is_subclass_of($bundleName, Bundle::class)) {
        /** @var Bundle $bundle */
        $bundle = new $bundleName();
        $bundle->register($app);
    }
    
}