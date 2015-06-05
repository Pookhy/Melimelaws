<?php

namespace Video;

class VideoHtml {

    public static function displayVideo($video) {
        $url = $video->getAdresse();
        $url = str_replace("watch?v=", "v/", $url);

        $type = $video->getType() == "episode" ? "episode" : "bonus";
        $type = ucfirst($type);

        $html = '';
        $html .= <<<EOT
            <div class="video">
                <span class="videoTitle">{$type} {$video->getNum()}</span>
                <br/>
                <iframe width="560" height="315" src="$url" frameborder="0" allowfullscreen></iframe>
                <!--[if lte IE 6 ]>
                    <embed src="$url" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed>
                <![endif]-->
            </div>
EOT;
        return $html;
    }

    public static function displayVideos($videos) {
        $html = "";
        foreach ($videos as $video) {
            var_dump($videos);
            $html .= self::displayVideo($video);
        }

        return $html;
    }

}
