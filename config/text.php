<?php
require_once '../vendor/autoload.php';

use Vonage\Client\Credentials\Basic;
use Vonage\Client;
use Vonage\SMS\Message\SMS;

function sendMessage($number, $textmessage)
{
    //account 1
   //"b7bfbf02", "im6KhsJlAs8RbGxt"
    //account 2
     //"053e17f8", "EoDrz2TbOyhtxD3q"
     //account 3
     //"b374afb1", "1pXDibTgSaQUHk2s"
     //acount 4
     //"16814799", "7o7pIlYjoXfzbooi"
    
    $basic  = new Basic("b374afb1", "1pXDibTgSaQUHk2s");
    $client = new Client($basic);
    $response = $client->sms()->send(
        new SMS($number, 'Brand Name', $textmessage)
    );

    $message = $response->current();

    if ($message->getStatus() == 0) {
      return true;
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }
}
