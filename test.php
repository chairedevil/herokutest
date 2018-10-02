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

?>