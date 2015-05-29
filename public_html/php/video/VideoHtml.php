<?php

namespace Video;

class VideoHtml{
    public static function displayVideo($video){
        $html = '';
        $html .= <<<EOT
               echo bonjour ezjfozejf fskdfsdlmfjskmfjsdfmsdjlfsdfmjslpsf "bonjour'jout'" 'jou'
EOT;
        return $html;
    }
    
    public static function displayVideos($videos){
        $html = "";
        foreach($videos as $video){
            $html .= self::displayVideo($video);
        }
        
        return $html;
    }
}