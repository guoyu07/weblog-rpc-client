<?php

namespace Hybrid\Weblog\Client\Providor;

use Hybrid\Weblog\Client\BloggerInterface;
use Hybrid\Weblog\Client\MetaWeblogInterface;
use Hybrid\Weblog\Client\WordPressInterface;
use Hybrid\Weblog\Client\QueryException;

use Hybrid\Weblog\Client\Struct\Post;
use Hybrid\Weblog\Client\Struct\WPCategory;
use Hybrid\Weblog\Client\Struct\FileData;

use Incutio\XMLRPC\Client\Base as IXR_Client;

/**
 * 博客园xmlrpc接口适配
 */
class CNBlogs implements BloggerInterface, MetaWeblogInterface, WordPressInterface
{
    const URL = 'http://rpc.cnblogs.com/metaweblog/';
    const PATH = '';
    
    protected $appKey;
    protected $username;
    protected $password;
    protected $blogId;
    
    protected $rpcClient;

    public function __construct($username, $password, $blogId = '', $appKey = '')
    {
        $this->username = $username;
        $this->password = $password;
        $this->appKey = $appKey;
        $this->blogId = $blogId;
        
        $this->rpcClient = new IXR_Client(static::URL . $this->blogId);
        $this->rpcClient->debug = true;
    }
    
    public function editPost($postId, Post $post, $publish)
    {
        return $this->query(
                'metaWeblog.editPost', 
                $postId, 
                $this->username, 
                $this->password,
                $post,
                $publish
        );
    }

    public function getCategories()
    {
        return $this->query(
                'metaWeblog.getCategories', 
                $this->blogId, 
                $this->username, 
                $this->password
        );
    }

    public function getPost($postId)
    {
        return $this->query(
                'metaWeblog.getPost', 
                $postId, 
                $this->username, 
                $this->password
        );
    }

    public function getRecentPosts($numberOfPosts)
    {
        return $this->query(
                'metaWeblog.getRecentPosts', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $numberOfPosts
        );
    }

    public function newCategory(WPCategory $category)
    {
        return $this->query(
                'wp.newCategory', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $category
        );
    }

    public function newMediaObject(FileData $file)
    {
        return $this->query(
                'metaWeblog.newMediaObject', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $file
        );
    }

    public function newPost(Post $post, $publish)
    {
        return $this->query(
                'metaWeblog.getPost', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $post,
                $publish
       );
    }

    public function deletePost($postId, $publish)
    {
        return $this->query(
                'blogger.deletePost', 
                $this->appKey, 
                $postId,
                $this->username, 
                $this->password,
                $publish
        );
    }

    public function getUsersBlogs()
    {
        return $this->query(
                'blogger.getUsersBlogs', 
                $this->appKey, 
                $this->username, 
                $this->password
        );
    }
    
    protected function query()
    {
        $args = func_get_args();
        if (!$this->rpcClient->query($args)) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

}
