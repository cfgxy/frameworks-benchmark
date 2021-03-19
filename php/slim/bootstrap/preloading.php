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