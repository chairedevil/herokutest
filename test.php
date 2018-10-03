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
            echo "<br>rev 16<br>";

        }

        $cache = new Instagram\Storage\CacheManager('instragram_cache');

        $api = new Instagram\Api($cache);
        $api->setUserName('jpanpanpan');

        try {

            // First page
            /** @var \Instagram\Hydrator\Component\Feed $feed */
            $feed = $api->getFeed();
            echo '============================' . "<br>";
            echo 'User Informations : ' . "<br>";
            echo '============================' . "<br><br>";
            echo 'ID        : ' . $feed->getId() . "<br>";
            echo 'Full Name : ' . $feed->getFullName() . "<br>";
            echo 'UserName  : ' . $feed->getUserName() . "<br>";
            echo 'Following : ' . $feed->getFollowing() . "<br>";
            echo 'Followers : ' . $feed->getFollowers() . "<br><br>";
            echo '============================' . "<br>";
            echo 'Medias first page : ' . "<br>";
            echo '============================' . "<br><br>";
            /** @var \Instagram\Hydrator\Component\Media $media */
            echo '<pre>';
            print_r($feed->getMedias()[0]);
            echo '</pre>';
            echo '2<pre>';
            print_r($feed->getMedias()[0]->getThumbnailSrc());
            echo '</pre>';
            echo '3<pre>';
            print_r($feed->getMedias()[0]['thumbnailSrc']);
            echo '</pre>';
                //echo 'ID        : ' . $media->getId() . "<br>";
                //echo 'Caption   : ' . $media->getCaption() . "<br>";
                //echo 'Link      : <img src="' . $feed->getMedias()[0]['thumbnailSrc'] . '"><br>';
                //echo 'Likes     : ' . $media->getLikes() . "<br>";
                //echo 'Date      : ' . $media->getDate()->format('Y-m-d h:i:s') . "<br>";
                //echo '============================' . "<br>";
            

        } catch (Exception $exception) {
            print_r($exception->getMessage());
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            print_r($exception->getMessage());
        }

    ?>
</body>
</html>