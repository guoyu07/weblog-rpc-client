<?php

namespace Hybrid\Weblog\Client\Struct;

class FileData
{
    /**
     *
     * @var string $bits base64编码过的文件内容
     */
    public $bits;
    
    /**
     *
     * @var string $name 文件名称
     */
    public $name;
    
    /**
     *
     * @var string $type 文件类型
     */
    public $type;
}

