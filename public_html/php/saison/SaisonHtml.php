<?php

namespace Saison;

class SaisonHtml
{

    public static function displaySaison($saison)
    {
        $html = '';
        $html .= <<<EOT
            <div class="saison">
                <a href="index.php?t=saison&action=voirSaison&id={$saison->getId()}">
                    <span class="saisonTitle">Saison {$saison->getNum()}</span>
                    <img alt="" src="{$saison->getPhoto()}"/><br/>
                </a>
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
