<?php

namespace Hybrid\Weblog\Client;

use Hybrid\Weblog\Client\Struct\WPCategory;

interface WordPressInterface
{
    
    /**
     * Create a new category
     * 
     * @param WPCategory $category
     * @return integer
     */
    public function newCategory(WPCategory $category);
}