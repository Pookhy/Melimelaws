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
    
    public static function displayAmdinVideos($videos) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);
        $html = "";
        $html .= <<<EOT
        <table>
            <caption>Table Vidéo</caption>
            <tr>
                <th>id Vidéo</th>
                <th>Numéro</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Adresse</th>
                <th>Type</th>
                <th>Visible sur l'accueil</th>
                <th>num Saison</th>
            </tr>     
EOT;
        foreach ($videos as $video) {
            $html .= <<<EOT
            <tr>
                <td>{$video->getId()}</td>
                <td>{$video->getNum()}</td>
                <td>{$video->getTitre()}</td>
                <td>{$video->getDescription()}</td>
                <td>{$video->getAdresse()}</td>
                <td>{$video->getType()}</td>
                <td>{$video->getAccueil()}</td>
                <td>{$video->getNumSaison()}</td>
                <td>
                    <a href="index.php?t=Video&action=formUpdateVideo&id={$video->getId()}" alt="Modifier">
                        Modifier
                    </a>
                </td>
                <td>
                    <a href="index.php?t=Video&action=formDeleteVideo&id={$video->getId()}" alt="Supprimer">
                        Supprimer
                    </a>
                </td>
            </tr>    
EOT;
        }
        $html .= "</table>";
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

    public static function displayInsertVideo($saisons) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);

        $html = '';
        $html .= <<<EOT
            <div class="insert">
                <form action ="./index.php?t=video&action=insertVideo" method="post">
                    <fieldset>
                        <legend> Vidéo </legend>
                            <label for"num">Numéro :</label> 
                            <input id="num" type="text" name="num">
                            <br/>
                            <label for"titre">Titre :</label>
                            <input id="titre" type="text" name="titre">
                            <br/>
                            <label for"description">Description :</label> 
                            <input id="description" type="text" name="description">
                            <br/>
                            <label for"adresse">Adresse YouTube :</label> 
                            <input id="adresse" type="text" name="adresse">
                            <br/>
                            <label for"type">Type :</label> 
                            <select id="type" type="text" name="type">
                                <option value="episode">episode</otpion>
                                <option value="bonus">bonus</otpion>
                            </select>
                            <br/>
                            <label for"accueil">Visible sur l'accueil :</label> 
                            <select id="accueil" type="text" name="accueil">
                                <option value="1" default>Non</otpion>
                                <option value="0">Oui</otpion> 
                            </select>
                            <br/>
                            <label for"idSaison">Saison :</label> 
                            <select id="idSaison" type="text" name="idSaison">
EOT;
        foreach ($saisons as $saison){
            $html .= "<option value = \"{$saison->getId()}\">Saison {$saison->getNum()}</otpion >";

        }
        $html .= <<<EOT
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
    
    public static function displayFormUpdateVideo($video) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);
 
        $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
        $video->setNumSaison($saison->getNum());

        $html = '';
        $html .= <<<EOT
            <div class="Modification">
                <form action ="./index.php?t=video&action=updateVideo" method="post">
                    <fieldset>
                        <legend> Vidéo à modifier </legend> 
                            <input id="id" type="hidden" name="id">
                
                            <label for"num">Numéro :</label> 
                            <input id="num" type="text" name="num" value={$video->getNum()}>
                            <br/>
                            <label for"titre">Titre :</label>
                            <input id="titre" type="text" name="titre" value={$video->getTitre()}>
                            <br/>
                            <label for"description">Description :</label> 
                            <input id="description" type="text" name="description" value={$video->getDescription()}>
                            <br/>
                            <label for"adresse">Adresse YouTube :</label> 
                            <input id="adresse" type="text" name="adresse" value={$video->getAdresse()}>
                            <br/>
                            <label for"type">Type :</label> 
                            <select id="type" type="text" name="type">
                                <option value="episode">episode</otpion>
                                <option value="bonus">bonus</otpion>
                            </select>
                            <br/>
                            <label for"accueil">Visible sur l'accueil :</label> 
                            <select id="accueil" type="text" name="accueil">
                                <option value="1" default>Non</otpion>
                                <option value="0">Oui</otpion> 
                            </select>
                            <br/>
                            <label for"idSaison">Saison :</label> 
                            <select id="idSaison" type="text" name="idSaison" value={$video->getNumSaison()}>
EOT;
        foreach ($saisons as $saison){
            $html .= "<option value = \"{$saison->getId()}\">Saison {$saison->getNum()}</otpion >";

        }
        $html .= <<<EOT
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
