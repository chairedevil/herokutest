<?php
require_once('lib/LINEBotTiny.php');
require_once('lib/replyMsg.class.php');

$channelAccessToken = 'weCV1UB0jNHZOHIjosN0Cz5kCJ/mkiudeXUsYV7lBDtClTi3PmMDfhp9S3OMZJ3/K5fAtQFE0eE14KwVBojZKab9gqsurO81WYb7t73zvN1fRVdtfLuulXRxWH0441g1DfFZeb3Kdco5d6sfbABn1QdB04t89/1O/w1cDnyilFU=';
$channelSecret = '2bc86a87dc5a71bf884791a3b52e67b8';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];

            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => "chai"
                            )
                        )
                    ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }

            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
