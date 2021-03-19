<?php

foreach (opcache_get_status()['scripts'] as $file => $info) {
    if (strpos($file, '/system/') !== false) {
        echo $file, PHP_EOL;
    }
}