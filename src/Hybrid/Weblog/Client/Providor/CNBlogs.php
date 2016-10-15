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
        if (!$this->rpcClient->query(
                'metaWeblog.editPost', 
                $postId, 
                $this->username, 
                $this->password,
                $post,
                $publish
                )) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function getCategories()
    {
        if (!$this->rpcClient->query(
                'metaWeblog.getCategories', 
                $this->blogId, 
                $this->username, 
                $this->password)) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function getPost($postId)
    {
        if (!$this->rpcClient->query(
                'metaWeblog.getPost', 
                $postId, 
                $this->username, 
                $this->password)) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function getRecentPosts($numberOfPosts)
    {
        if (!$this->rpcClient->query(
                'metaWeblog.getRecentPosts', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $numberOfPosts
                )) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function newCategory(WPCategory $category)
    {
        if (!$this->rpcClient->query(
                'wp.newCategory', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $category
                )) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function newMediaObject(FileData $file)
    {
        if (!$this->rpcClient->query(
                'metaWeblog.newMediaObject', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $file
                )) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function newPost(Post $post, $publish)
    {
        if (!$this->rpcClient->query(
                'metaWeblog.getPost', 
                $this->blogId, 
                $this->username, 
                $this->password,
                $post,
                $publish
                )) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function deletePost($postId, $publish)
    {
        if (!$this->rpcClient->query(
                'blogger.deletePost', 
                $this->appKey, 
                $postId,
                $this->username, 
                $this->password,
                $publish
                )) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

    public function getUsersBlogs()
    {
        if (!$this->rpcClient->query(
                'blogger.getUsersBlogs', 
                $this->appKey, 
                $this->username, 
                $this->password
                )) {
            throw new QueryException('An error occurred - ' . $this->rpcClient->getErrorCode() . ":" . $this->rpcClient->getErrorMessage());
        }
        return $this->rpcClient->getResponse();
    }

}
