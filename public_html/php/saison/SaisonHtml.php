<?php

namespace Saison;

class SaisonHtml{
    public static function displaySaison($saison){
        $html = '';
        $html .= <<<EOT
               affichage d'une saison
EOT;
        return $html;
    }
    
    public static function displaySaisons($saisons){
        $html = "";
        foreach($saisons as $saison){
            $html .= self::displaySaison($saison);
        }
        
        return $html;
    }
}