<?php

namespace Video;

class VideoHtml{
    public static function displayVideo($video){
        $html = '';
        $html .= <<<EOT
               affichage d'une video
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