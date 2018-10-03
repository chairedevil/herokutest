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
            echo "<br>rev4<br>";

        }

        $cache = new Instagram\Storage\CacheManager('instragram_cache');

        $api = new Instagram\Api($cache);
        $api->setUserName('pgrimaud');

        try {
            // First page
            /** @var \Instagram\Hydrator\Component\Feed $feed */
            $feed = $api->getFeed();
            echo '============================' . "\n";
            echo 'User Informations : ' . "\n";
            echo '============================' . "\n\n";
            echo 'ID        : ' . $feed->getId() . "\n";
            echo 'Full Name : ' . $feed->getFullName() . "\n";
            echo 'UserName  : ' . $feed->getUserName() . "\n";
            echo 'Following : ' . $feed->getFollowing() . "\n";
            echo 'Followers : ' . $feed->getFollowers() . "\n\n";
            echo '============================' . "\n";
            echo 'Medias first page : ' . "\n";
            echo '============================' . "\n\n";
            /** @var \Instagram\Hydrator\Component\Media $media */
            foreach ($feed->getMedias() as $media) {
                echo 'ID        : ' . $media->getId() . "\n";
                echo 'Caption   : ' . $media->getCaption() . "\n";
                echo 'Link      : ' . $media->getLink() . "\n";
                echo 'Likes     : ' . $media->getLikes() . "\n";
                echo 'Date      : ' . $media->getDate()->format('Y-m-d h:i:s') . "\n";
                echo '============================' . "\n";
            }
            // Second Page
            $api->setEndCursor($feed->getEndCursor());
            sleep(1); // avoir 429 Rate limit from Instagram
            $feed = $api->getFeed();
            echo "\n\n";
            echo '============================' . "\n";
            echo 'Medias second page : ' . "\n";
            echo '============================' . "\n\n";
            /** @var \Instagram\Hydrator\Component\Media $media */
            foreach ($feed->getMedias() as $media) {
                echo 'ID        : ' . $media->getId() . "\n";
                echo 'Caption   : ' . $media->getCaption() . "\n";
                echo 'Link      : ' . $media->getLink() . "\n";
                echo 'Likes     : ' . $media->getLikes() . "\n";
                echo 'Date      : ' . $media->getDate()->format('Y-m-d h:i:s') . "\n";
                echo '============================' . "\n";
            }
            // And etc...
        } catch (Exception $exception) {
            print_r($exception->getMessage());
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            print_r($exception->getMessage());
        }

    ?>
</body>
</html>