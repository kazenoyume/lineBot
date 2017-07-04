<?php
include "LINE/LINEBot/HTTPClient/CurlHTTPClient.php";
include "LINE/LINEBot.php";
include "LINE/LINEBot/MessageBuilder/TextMessageBuilder.php";

use LINE\LINEBot\HTTPClient;
use LINE;
use LINE\LINEBot\MessageBuilder;

$access_token ='PMYTOjEFFN7ZnBSMDdKUmtgkjod7Xkukm4g2LNyFGB7q6FsPFym2zhiUsN7GWbb5DkJEV1nPsOqmvZ81MaUTUdokXu0pxd/ZM9Vt5nxGdghJkveeo2MfWR7mhY6EuSfMv94qG6rZmkDPLn2Cz+ik1QdB04t89/1O/w1cDnyilFU=';




$jsonString = file_get_contents('php://input');
$jsonObject = json_decode($jsonString);

//取得MID
$targetMID = $jsonObject->{"result"}[0]->{"content"}->{"from"};
//取得訊息
$message = $jsonObject->{"result"}[0]->{"content"}->{"text"};


header("Content-Type:text/html; charset=utf-8");

$secret = '455f74dac591d18ede2d996eb202f440';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('PMYTOjEFFN7ZnBSMDdKUmtgkjod7Xkukm4g2LNyFGB7q6FsPFym2zhiUsN7GWbb5DkJEV1nPsOqmvZ81MaUTUdokXu0pxd/ZM9Vt5nxGdghJkveeo2MfWR7mhY6EuSfMv94qG6rZmkDPLn2Cz+ik1QdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $secret]);

$bot->replyText($targetMID, $message);

?>