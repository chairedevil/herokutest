<?php
require_once('lib/LINEBotTiny.php');
require_once('lib/replyMsg.class.php');

$channelAccessToken = 'rY8bFWWrNfgT7geI9PKV3LDb/stfZGW/NakTYGA4m1oaY0W1xvhUlvuSxtEUOWoGK5fAtQFE0eE14KwVBojZKab9gqsurO81WYb7t73zvN1UaAFjVmih0fLi8Nj/5J3ijFihgrg6Lh5vtvmz/RAaFQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '2bc86a87dc5a71bf884791a3b52e67b8';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];

            switch ($message['type']) {
                case 'text':
                    switch($message['text'][0]){
                        case '#':
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => "translate"
                                    )
                                )
                            ));
                            break;
                        case '@':
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => "instagram"
                                    )
                                )
                            ));
                            break;
                        defalut :
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => "ラインボットですよ。"
                                    )
                                )
                            ));
                            break;
                    }
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
