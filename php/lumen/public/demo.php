<?php
foreach (array_keys(opcache_get_status(true)['scripts']) as $file) {
    echo $file, PHP_EOL;
}