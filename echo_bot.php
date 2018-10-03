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
                    $inputText = $message['text'][0];
                    $rm = new replyMsg();
                    switch($inputText){
                        case '#':
                            $tranText = substr($message['text'], 1);
                            $msgAry = array(
                                array(
                                    'type' => 'text',
                                    'text' => $rm->translate($tranText)
                                )
                            );
                            break;
                        case '@':
                            $userId = substr($message['text'], 1);
                            $img = $rm->getLastInstra($userId);
                            $msgAry = array(
                                array(
                                    'type' => 'image',
                                    'originalContentUrl' => $img['imgSrc'],
                                    'previewImageUrl' => $img['thumSrc']
                                )
                            );
                            break;
                        default :
                            $sendMsg = '分かった(' . $inputText . ') rev17';
                            $msgAry = array(
                                array(
                                    'type' => 'text',
                                    'text' => $sendMsg
                                )
                            );
                            break;
                    }
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => $msgAry
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
