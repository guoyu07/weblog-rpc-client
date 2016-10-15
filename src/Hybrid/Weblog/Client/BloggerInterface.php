<?php

namespace Hybrid\Weblog\Client;

interface BloggerInterface
{
    
    /**
     * Deletes a post.
     * @param string $postId 
     * @param boolean $publish Where applicable, this specifies whether the blog should be republished after the post has been deleted.
     * @return boolean Always returns true.
     */
    public function deletePost($postId, $publish);
    
    /**
     * Returns information on all the blogs a given user is a member.
     * @return array|\Hybrid\Weblog\Client\Struct\BlogInfo[]
     */
    public function getUsersBlogs();
}

