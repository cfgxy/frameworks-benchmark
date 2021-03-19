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

namespace Ahjob\Common\Model;

class Type
{
    private $type_id;
    
    private $node_path;
    private $parent_id;
    private $left_seq;
    private $right_seq;
    private $level;

    private $type_name;
    private $file_js;
    private $file_php;
}