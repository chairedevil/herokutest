<?php
    require_once('lib/replyMsg.class.php');
    require_once ('vendor/autoload.php');

    $message['type'] = "text";
    $message['text'] = "#こんばんは";

    //echo "<pre>";
    //print_r($message);
    //echo "</pre>";

    $rm = new replyMsg();

    //instagram Access Token : 1650237.6615052.2df86910def041519e66ed6cf97d15c8
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

        if($message['type'] == "text"){

            echo $rm->gen($message['text']);
            echo "<br>rev3<br>";

        }

        $cache = new Instagram\Storage\CacheManager('/path/to/your/cache/folder');
        $api   = new Instagram\Api($cache);
        $api->setUserName('pgrimaud');


        $feed = $api->getFeed();

        print_r($feed);

    ?>
</body>
</html>