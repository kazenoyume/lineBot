<?php
include "LINE/LINEBot/HTTPClient/CurlHTTPClient.php";
include "LINE/LINEBot.php";
include "LINE/LINEBot/MessageBuilder/TextMessageBuilder.php";

use LINE\LINEBot\HTTPClient;
use LINE;
use LINE\LINEBot\MessageBuilder;

$access_token= 'VkVYO1PZY9uGKGe8KK4Jr+HiUJqYjRj44pvK4Bt16cSn664s6l4MREDThTK4V2xICIsN6WHEz5fQbR6cEJC1/A/pfhpGg3knwiu1pT2qVYf5FEORD4HgfNQ8f/0yyyQd8jYkQss3zfdCV/Nc/HtgFgdB04t89/1O/w1cDnyilFU=';
                                    // VkVYO1PZY9uGKGe8KK4Jr+HiUJqYjRj44pvK4Bt16cSn664s6l4MREDThTK4V2xICIsN6WHEz5fQbR6cEJC1/A/pfhpGg3knwiu1pT2qVYf5FEORD4HgfNQ8f/0yyyQd8jYkQss3zfdCV/Nc/HtgFgdB04t89/1O/w1cDnyilFU=
                           


$jsonString = file_get_contents('php://input');
 $data = json_decode($jsonString, true);

//取得replutoken
$event = $data['events'];
$message = $event['message'];


header("Content-Type:text/html; charset=utf-8");

$secret = 'c6e4c7aadff9c795ac2d18ad56fc36cf';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $secret]);

$bot->replyText( $event['replyToken'], $message);

?>