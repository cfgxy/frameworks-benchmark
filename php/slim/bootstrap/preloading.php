<?php
$files = require __DIR__ . '/../vendor/composer/autoload_classmap.php';

foreach ($files as $name => $file) {
    if (strpos($name, 'Psr\\Log\\Test\\') === 0) {
        continue;
    }
    
    if (strpos($file, "/polyfill") !== false) {
        continue;
    }
    
    opcache_compile_file($file);
}