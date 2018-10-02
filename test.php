<?php
    require_once('lib/replyMsg.class.php');

    $message['type'] = "text";
    $message['text'] = "#こんばんは";

    echo "<pre>";
    print_r($message);
    echo "</pre>";

    $rm = new replyMsg();

    if($message['type'] == "text"){

        echo $rm->gen($message['text']);

    }



    $cache = new Instagram\Storage\CacheManager('/path/to/your/cache/folder');
    $api   = new Instagram\Api($cache);
    $api->setUserName('kunuthai');

    $feed = $api->getFeed();

    print_r($feed);

    //instagram Access Token : 1650237.6615052.2df86910def041519e66ed6cf97d15c8
?>
