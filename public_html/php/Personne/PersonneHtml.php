<?php

namespace personne;

class PersonneHtml{
    public static function displayPersonne($personne){
        $html = '';
        $html .= <<<EOT
               affichage d'une personne
EOT;
        return $html;
    }
    
    public static function displayPersonnes($personnes){
        $html = "";
        foreach($personnes as $personne){
            $html .= self::displayVideo($perosnne);
        }
        
        return $html;
    }
}