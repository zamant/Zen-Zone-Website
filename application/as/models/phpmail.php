<?php
class Phpmail extends Mail{
     public function send($to, $subject, $message, $headers){
     	mail($to, $subject, $message, $headers);
     }
}