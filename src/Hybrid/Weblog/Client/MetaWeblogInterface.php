<?php

namespace Hybrid\Weblog\Client;

use Hybrid\Weblog\Client\Struct\Post;
use Hybrid\Weblog\Client\Struct\CategoryInfo;
use Hybrid\Weblog\Client\Struct\FileData;

interface MetaWeblogInterface
{
    /**
     * Updates and existing post to a designated blog using the metaWeblog API. 
     * 
     * @param string $postId
     * @param Post $post
     * @param boolean $publish
     * @return mixed Returns true if completed.
     */
    public function editPost($postId, Post $post, $publish);
    
    /**
     * Makes a new post to a designated blog using the metaWeblog API. 
     * @param Post $post
     * @param boolean $publish
     * @return string Returns postid as a string.
     */
    public function newPost(Post $post, $publish);
    
    /**
     * Retrieves a list of valid categories for a post using the metaWeblog API. 
     * @return array|CategoryInfo[] Returns the metaWeblog categories struct collection.
     */
    public function getCategories();
    
    /**
     * Retrieves an existing post using the metaWeblog API. 
     * @param string $postId
     * @return Post Returns the metaWeblog struct.
     */
    public function getPost($postId);
    
    /**
     * Retrieves a list of the most recent existing post using the metaWeblog API. 
     * @param integer $numberOfPosts
     * @return Post[] Returns the metaWeblog struct collection.
     */
    public function getRecentPosts($numberOfPosts);
    
    /**
     * Makes a new file to a designated blog using the metaWeblog API. 
     * @param string $file 
     * @return UrlData Returns url as a string of a struct.
     */
    public function newMediaObject(FileData $file);
}