<?php

namespace Hybrid\Weblog\Client\Struct;

/**
 * Post data struct
 */
class Post
{
    /**
     *
     * @var DateTime Required when posting.
     */
    public $dateCreated;
    
    /**
     *
     * @var string Required when posting.
     */
    public $description;
    
    /**
     *
     * @var string Required when posting.
     */
    public $title;
    
    /**
     *
     * @var array string[] optional 
     */
    public $categories;
    
    /**
     *
     * @var Enclosure optional 
     */
    public $enclosure;
    
    /**
     *
     * @var string optional 
     */
    public $link;
    
    /**
     *
     * @var string optional 
     */
    public $permalink;
    
    /**
     *
     * @var string|int optional 
     */
    public $postid;
    
    /**
     *
     * @var Source optional 
     */
    public $source;
    
    /**
     *
     * @var string optional 
     */
    public $userid;
    
    /**
     *
     * @var mixed optional 
     */
    public $mt_allow_comments;
    
    /**
     *
     * @var mixed optional 
     */
    public $mt_allow_pings;
    
    /**
     *
     * @var mixed optional 
     */
    public $mt_convert_breaks;
    
    /**
     *
     * @var string optional 
     */
    public $mt_text_more;
    
    /**
     *
     * @var string optional 
     */
    public $mt_excerpt;
    
    /**
     *
     * @var string optional 
     */
    public $mt_keywords;
    
    /**
     *
     * @var string optional 
     */
    public $wp_slug;
}

