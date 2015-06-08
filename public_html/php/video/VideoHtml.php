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
    
    public static function insertVideo() {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);
        
        $html = '';
        $html .= <<<EOT
            <div class="insert">
                <form action ="" method="post">
                    <fieldset>
                        <legend> Vidéo </legend>
                            <label for"num">Numéro :</label> 
                            <input id="num" type="text" name="num">
                            <br/>
                            <label for"titre">Titre :</label>
                            <input id="titre" type="text" name="titre">
                            <br/>
                            <label for"desc">Description :</label> 
                            <input id="desc" type="text" name="desc">
                            <br/>
                            <label for"adr">Adresse YouTub :</label> 
                            <input id="adr" type="text" name="adr">
                            <br/>
                            <label for"type">Type :</label> 
                            <select id="type" type="text" name="type">
                                <option value=""></otpion>
                            </select>
                            <br/>
                            <label for"accueil">Visible sur l'accueil :</label> 
                            <select id="accueil" type="text" name="accueil">
                                <option value="0">Oui</otpion>
                                <option value="1" default>Non</otpion>
                            </select>
                            <br/>
                            <label for"idSaison">Saison :</label> 
                            <select id="idSaison" type="text" name="idSaison">
                                <option value=""></otpion>
                            </select>
                            <br/>
                            <br/>
                            <input type="submit" value="valider" />                 
                    </fieldset>
                </form>
            </div>
EOT;
        return $html;
    }

}
