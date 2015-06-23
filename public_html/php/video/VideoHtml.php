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
                <iframe src="$url" frameborder="0" allowfullscreen></iframe>
                <!--[if lte IE 6 ]>
                    <embed src="$url" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed>
                <![endif]-->
            </div>
EOT;
        return $html;
    }

    public static function displayVideos($videos) {
        $html = '<div id="contenu">';
        foreach ($videos as $video) {
            $html .= self::displayVideo($video);
        }
         $html .='</div>';

        return $html;
    }
    
    //ADMIN
    
    public static function displayAdminVideos($videos) {
        $html = "<div id='contenu'>";
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
                <td>
EOT;
                    if($video->getAccueil() != 1){
                        $html .="Non";
                    }else{
                        $html .="Oui";
                    }
                    $html .= <<<EOT
                </td>
                <td>{$video->getNumSaison()}</td>
                <td>
                    <a href="index.php?t=Video&action=formUpdateVideo&id={$video->getId()}" alt="Modifier">
                        Modifier
                    </a>
                </td>
                <td>
                    <a href="index.php?t=Video&action=deleteVideo&id={$video->getId()}" alt="Supprimer" onclick="return(confirm('Supprimer cette vidéo'))">
                        Supprimer
                    </a>
                </td>
            </tr>    
EOT;
        }
        $html .= "</table>";
        $html .= "<br/>";
        $html .= "<a href='index.php?t=Video&action=formInsertVideo' alt='Ajouter Video'>Ajouter</a>";
        $html .= "</div>";
        return $html;
    }

    public static function displayInsertVideo($saisons) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);

        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="insert">
                <form action ="./index.php?t=video&action=insertVideo" method="post">
                    <fieldset>
                        <legend> Vidéo </legend>
                            <label for"num">Numéro :</label> 
                            <input id="num" type="text" name="num_Video" required>
                            <br/>
                            <label for"titre">Titre :</label>
                            <input id="titre" type="text" name="titre_Video" required>
                            <br/>
                            <label for"description">Description :</label> 
                            <input id="description" type="text" name="description_Video" required>
                            <br/>
                            <label for"adresse">Adresse YouTube :</label> 
                            <input id="adresse" type="text" name="adresse_Video" required>
                            <br/>
                            <label for"type">Type :</label> 
                            <select id="type" type="text" name="type_Video">
                                <option value="episode" default>episode</otpion>
                                <option value="bonus">bonus</otpion>
                            </select>
                            <br/>
                            <label for"accueil">Visible sur l'accueil :</label> 
                            <select id="accueil" type="text" name="accueil_Video">
                                <option value="0" default>Non</otpion>
                                <option value="1">Oui</otpion> 
                            </select>
                            <br/>
                            <label for"idSaison">Saison :</label> 
                            <select id="idSaison" type="text" name="id_Saison"  required>
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
        $html .= "</div>";
        return $html;
    }
    
    public static function displayFormUpdateVideo($video, $saisons) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);
 
        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="Modification">
                <form action ="./index.php?t=video&action=updateVideo" method="post">
                    <fieldset>
                        <legend> Vidéo à modifier </legend> 
                            <input id="id" type="hidden" name="id_Video" value="{$video->getId()}">
                
                            <label for"num">Numéro :</label> 
                            <input id="num" type="text" name="num_Video" value="{$video->getNum()}">
                            <br/>
                            <label for"titre">Titre :</label>
                            <input id="titre" type="text" name="titre_Video" value="{$video->getTitre()}">
                            <br/>
                            <label for"description">Description :</label> 
                            <input id="description" type="text" name="description_Video" value="{$video->getDescription()}">
                            <br/>
                            <label for"adresse">Adresse YouTube :</label> 
                            <input id="adresse" type="text" name="adresse_Video" value="{$video->getAdresse()}">
                            <br/>
                            <label for"type">Type :</label> 
                            <select id="type" type="text" name="type_Video">
                                <option value="episode">episode</otpion>
                                <option value="bonus">bonus</otpion>
                            </select>
                            <br/>
                            <label for"accueil">Visible sur l'accueil :</label> 
                            <select id="accueil" type="text" name="accueil_Video">
                                <option value =\"{$video->getAccueil()}\" selected >
EOT;
                                if($video->getAccueil() != 1){
                                    $html .="Non";
                                }else{
                                    $html .="Oui";
                                }
                                
                                $html .= <<<EOT
                                </option>
EOT;
                                if($video->getAccueil() == 1){
                                    $html .="<option value='0'>Non</option>";
                                }else{
                                    $html .="<option value='1'>Oui</option>";
                                }
                                
                            $html .= <<<EOT
                            </select>
                            <br/>
                            <label for"idSaison">Saison :</label> 
                            <select id="idSaison" type="text" name="id_Saison" value="{$video->getNumSaison()}">
EOT;
                            foreach ($saisons as $saison){
                                $html .= "<option value = \"{$saison->getId()}\"";
                                if($saison->getNum() == $video->getNumSaison())
                                {
                                    $html .= 'selected';
                                }
                                $html .= ">Saison {$saison->getNum()}</otpion >";

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
        $html .= "</div>";
        return $html;
    }
}
