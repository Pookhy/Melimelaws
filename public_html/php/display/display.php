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
                    <a href="index.php">Accueil</a>
                    </li>
                    <li>
                    <a href="index.php?t=saison&action=allSaisons">Vid&eacute;os</a>
                    </li>
                    <li>
                    <a href="index.php?t=personne&action=diffEquipe">&Eacute;quipe</a>
                    </li>
                    <li>
                    <a href="index.php?t=display&action=displayContact">Contact</a>
                    </li>
                </ul>
            </nav>            

EOT;
        return $html;
    }
    
    public static function displayContact()
    {
        $html = <<<EOT
                <form method="post" action="">
 
                    <fieldset>
                        <legend>Contact</legend> 

                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" />

                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" id="prenom" />

                        <label for="email">E-mail :</label>
                        <input type="email" name="email" id="email" />
                    
                        <label for="objet">Objet :</label><br />
                        <select name="objet" id="objet">
                            <option value="question">Question</option>
                            <option value="participer">Participer</option>
                            <option value="autre">Autre</option>
                        </select>

                        <label for="demande">Demande :</label>
                        <textarea name="demande" id="demande" cols="40" rows="4"></textarea>
                        
                        <input type="submit" value="Envoyer" />
                    </fieldset>
                </form>
EOT;
        return $html;
    }
    
    public static function displayRight()
    {
        //
    }

    public static function displayFooter()
    {
        $html = <<<EOT
                <a href="#">Mentions L&eacute;gales</a> <a href="#">Contact</a>
EOT;
        return $html;
    }
}
