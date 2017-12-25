<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
require_once('./LINEBotTiny.php');

$channelAccessToken = 'VkVYO1PZY9uGKGe8KK4Jr+HiUJqYjRj44pvK4Bt16cSn664s6l4MREDThTK4V2xICIsN6WHEz5fQbR6cEJC1/A/pfhpGg3knwiu1pT2qVYf5FEORD4HgfNQ8f/0yyyQd8jYkQss3zfdCV/Nc/HtgFgdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'c6e4c7aadff9c795ac2d18ad56fc36cf';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {

        case 'source':

            break;
        case 'message':
            $message = $event['message'];
            $source = $event['source'];
            $test = $message['text'] . $source['userId'];
            switch ($message['type']) {
                case 'text':
                    switch ($message['text']) {
                        case 'uid':
                            $test = $source['userId'];
                            break;
                        case 'rid':
                            $test = $event['replyToken'];
                            break;
                        default:
                            $test = $message['text'];
                            break;
                    }
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $test
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
