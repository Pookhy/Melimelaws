<?php

namespace Display;

class Display
{

    public static function displayHeader()
    {
        $html = <<<EOT
<a href="./">
                <img alt="" src="logo.png" />
                logo
            </a>
            <nav id="mainMenu">
                <ul>
                    <li>
                    <a href="#">Accueil</a>
                    </li>
                    <li>
                    <a href="#">Vid&eacute;os</a>
                    </li>
                    <li>
                    <a href="#">&Eacute;quipe</a>
                    </li>
                    <li>
                    <a href="#">Contact</a>
                    </li>
                </ul>
            </nav>            

EOT;
        return $html;
    }

    public static function displayFooter()
    {
        $html = <<<EOT
                <a href="#">Mentions L&eacute;gales</a> <a href="#">Contact</a>
EOT;
        return $html;
    }
}
