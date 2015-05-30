<?php

namespace Video;

class VideoHtml{
    public static function displayVideo($video){
        $html = '';
        $html .= <<<EOT
            <div>
                 <object type="application/x-shockwave-flash" width="425" height="355" data="$video[adresse]">
                         <param name="movie" value="$video[adresse]" />
                         <param name="wmode" value="transparent" />
                 </object>

                 <!--[if lte IE 6 ]>
                         <embed src="$video[adresse]" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed>
                 <![endif]-->
             </div>
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