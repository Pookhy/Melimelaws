<?php

namespace Saison;

class SaisonHtml
{

    public static function displaySaison($saison)
    {
        $html = '';
        $html .= <<<EOT
            <div class="saison">
                <img alt="" src="{$saison->getPhoto()}"/><br/>
                <span class="saisonTitle">Saison {$saison->getNum()}</span>
            </div>
EOT;
        return $html;
    }

    public static function displaySaisons($saisons)
    {
        $html = "";
        foreach ($saisons as $saison) {
            $html .= self::displaySaison($saison);
        }

        return $html;
    }

}
