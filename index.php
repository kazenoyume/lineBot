                                                                               <?php

$access_token ='VkVYO1PZY9uGKGe8KK4Jr+HiUJqYjRj44pvK4Bt16cSn664s6l4MREDThTK4V2xICIsN6WHEz5fQbR6cEJC1/A/pfhpGg3knwiu1pT2qVYf5FEORD4HgfNQ8f/0yyyQd8jYkQss3zfdCV/Nc/HtgFgdB04t89/1O/w1cDnyilFU=';


//define('TOKEN', '§AªºChannel Access Token');



$json_string = file_get_contents('php://input');

$json_obj = json_decode($json_string);



$event = $json_obj->{"events"}[0];

$type  = $event->{"message"}->{"type"};

$message = $event->{"message"};

$reply_token = $event->{"replyToken"};

        

$post_data = [

  "replyToken" => $reply_token,

  "messages" => [

    [

      "type" => "text",

      "text" => $message->{"text"}

    ]

  ]

]; 



$ch = curl_init("https://api.line.me/v2/bot/message/reply");

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    'Content-Type: application/json',

    'Authorization: Bearer '.$access_token

    //'Authorization: Bearer '. TOKEN

));

$result = curl_exec($ch);

curl_close($ch); 

?>