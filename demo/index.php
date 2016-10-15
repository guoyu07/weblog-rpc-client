<?php

require __DIR__ . '/../../ixr/src/Incutio/Autoloader.php';
Incutio\Autoloader::register();

require __DIR__ . '/../src/Hybrid/Autoloader.php';
Hybrid\Autoloader::register();

use Hybrid\Weblog\Client\Providor\CNBlogs as CNBlogsClient;
use Hybrid\Weblog\Client\QueryException;

$blogid = defined('CNBLOGS_BID') ? CNBLOGS_BID : '';
$username = defined('CNBLOGS_UNAME') ? CNBLOGS_UNAME : '';
$password = defined('CNBLOGS_PWD') ? CNBLOGS_PWD : '';

$client = new CNBlogsClient($username, $password, $blogid);

try {
    //$cates = $client->getCategories($blogid);
    //var_dump($cates);

    $recent_posts = $client->getRecentPosts(3);
    var_dump($recent_posts);
} catch (QueryException $e) {
    echo $e->getMessage();
}

