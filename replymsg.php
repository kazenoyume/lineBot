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

//$textMessageBuilder = new MessageBuilder\TextMessageBuilder($message);
//$response = $bot->pushMessage($targetMID, $textMessageBuilder);
$textMessageBuilder = new MessageBuilder\TextMessageBuilder($jsonObject);
$response = $bot->pushMessage('Uaa0637612b1059d6b2d584a2b5bd2889', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

//$file = fopen("C:\AppServ\www\LINE\Line_log.txt", "a+");
//fwrite($file, $json_string."\r\n");  
//$json_obj = json_decode($json_string);


//$event = $json_obj->{"events"}[0];
//$type  = $event->{"message"}->{"type"};
//$message = $event->{"message"};
//$reply_token = $event->{"replyToken"};
//        
//$post_data = [
//  "replyToken" => $reply_token,
//  "messages" => [
//    [
//      "type" => "text",
//      "text" => $message->{"text"}
//    ]
//  ]
//]; 
//
//fwrite($file, json_encode($post_data)."\n");
//
//
//$ch = curl_init("https://api.line.me/v2/bot/message/reply");
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//    'Content-Type: application/json',
//    'Authorization: Bearer '.$access_token
//    //'Authorization: Bearer '. TOKEN
//));
//$result = curl_exec($ch);
//fwrite($file, $result."\n");  
//fclose($file);
//curl_close($ch);
?>