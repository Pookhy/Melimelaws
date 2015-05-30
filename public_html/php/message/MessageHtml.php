<?php

namespace Message;

class MessageHtml{
    public static function displayMessage($message){
        $html = '';
        $html .= <<<EOT
               affichage message
EOT;
        return $html;
    }
    
    public static function displayMessages($messages){
        $html = "";
        foreach($messages as $message){
            $html .= self::displayMessage($message);
        }
        
        return $html;
    }
}