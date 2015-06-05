<?php

namespace Personne;

class PersonneHtml {

    public static function displayPersonne($personne) {
        var_dump($personne);
        $html = <<<EOT
            <div class="personne">
               <img alt="" src="{$personne->getPhoto()}"/>
               
                <div class="infoPersonne>
                    <span class="nomPrenomPersonne">{$personne->getNom()} {$personne->getPrenom()}</span>
                    <br/> 
                    <span class="bio">{$personne->getBio()}</span>
                </div>
            </div>
EOT;
        return $html;
    }

    public static function displayPersonnes($personnes) {
        $html = "";
        foreach ($personnes as $personne) {
            $html .= self::displayPersonne($personne);
        }

        return $html;
    }
    
    public static function displayEquipes($personnes) {
        $html = "";
        foreach ($personnes as $personne) {
            $html .= self::displayPersonne($personne);
        }

        return $html;
    }

    public static function displayChoixTypePersonne() {
        $html = "";
        $html .= <<<EOT
            <div class="personne">
               
                <a href="index.php?t=Personne&action=allEquipe" >
                    <span>Les Melimelaws</span>
                    <img alt="" src="http://www.vaceva.com/v2/img/rubriques/equipe.jpg"/>
                </a>
                
               <br/>
                
                <a href="index.php?t=Personne&action=allGuest" >
                    <span>Les Guest</span>
                    <img alt="" src="http://www.searchmarketingstandard.com/wp-content/uploads/2013/04/WelcomeGuestsshutterstock_10730578.jpg"/>
                </a>
               
            </div>
EOT;

        return $html;
    }

}
