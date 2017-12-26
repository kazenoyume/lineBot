                                                                               <?php

$access_token ='VkVYO1PZY9uGKGe8KK4Jr+HiUJqYjRj44pvK4Bt16cSn664s6l4MREDThTK4V2xICIsN6WHEz5fQbR6cEJC1/A/pfhpGg3knwiu1pT2qVYf5FEORD4HgfNQ8f/0yyyQd8jYkQss3zfdCV/Nc/HtgFgdB04t89/1O/w1cDnyilFU=';



$json_string = file_get_contents('php://input');

get_tiny_url($json_string+"123");



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

fwrite($file, json_encode($post_data)."\n");



$ch = curl_init("https://api.line.me/v2/bot/message/reply");

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    'Content-Type: application/json',

    'Authorization: Bearer '.$access_token

    //'Authorization: Bearer '. TOKEN

));

$result = curl_exec($ch);

fwrite($file, $result."\n");  

fclose($file);

curl_close($ch); 



function get_url($url)  {  

	$ch = curl_init();  

	$timeout = 5;  

	curl_setopt($ch,CURLOPT_URL,'https://floating-cliffs-58017.herokuapp.com/pushmsg.php?UID=Uaa0637612b1059d6b2d584a2b5bd2889&text='+$url);  

	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  

	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  

	$data = curl_exec($ch);  

	curl_close($ch);  

	return $data;  

}

?>