<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


include "LINE/LINEBot/HTTPClient/CurlHTTPClient.php";
include "LINE/LINEBot.php";
include "LINE/LINEBot/MessageBuilder/TextMessageBuilder.php";

use LINE\LINEBot\HTTPClient;
use LINE;
use LINE\LINEBot\MessageBuilder;

header("Content-Type:text/html; charset=utf-8");

$secret = '455f74dac591d18ede2d996eb202f440';
$text = filter_input(INPUT_GET, 'text');
$UID = filter_input(INPUT_GET, 'UID');
    //$text='1234';
#$token = $_POST['token'];
#$secret = $_POST['channelSecret'];
#$text = $_POST['text'];
#$UID = $_POST['UID'];

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('PMYTOjEFFN7ZnBSMDdKUmtgkjod7Xkukm4g2LNyFGB7q6FsPFym2zhiUsN7GWbb5DkJEV1nPsOqmvZ81MaUTUdokXu0pxd/ZM9Vt5nxGdghJkveeo2MfWR7mhY6EuSfMv94qG6rZmkDPLn2Cz+ik1QdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $secret]);

$textMessageBuilder = new MessageBuilder\TextMessageBuilder($text);
$response = $bot->pushMessage($UID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

