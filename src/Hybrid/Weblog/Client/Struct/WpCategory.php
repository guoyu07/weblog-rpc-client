<?php

namespace Hybrid\Weblog\Client\Struct;

class WpCategory
{
    
    /**
     *
     * @var string 
     */
    public $name;
    
    /**
     *
     * @var string optional
     */
    public $slug;
    
    /**
     *
     * @var integer
     */
    public $parent_id;
    
    /**
     *
     * @var string optional
     */
    public $description;
}

