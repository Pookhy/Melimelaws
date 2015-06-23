<?php

namespace Display;

class Display
{

    public static function displayHeader()
    {
        $auth= \User\AuthManager::getInstance();
        if($auth->isConnected()){
            $html = <<<EOT
            
            <div id="tete">
                <a href="./">
                    <img id="logo" alt="accueil" src="./ui/img/logo.jpg" />
                </a>
            </div>
            
            <nav id="mainMenu">
                <ul>
                    <li>
                        <a href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="#">Saison</a>
                    </li>
                    <li>
                        <a href="#>Vid&eacute;os</a>
                    </li>
                    <li>
                        <a href="#">&Eacute;quipe</a>
                    </li>
                    
                </ul>
            </nav>
EOT;
        }else{
            $html = <<<EOT

            <div id="tete">
                <a href="./">
                    <img id="logo" alt="accueil" src="./ui/img/logo.jpg" />
                </a>
            </div>
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
                    <a href="index.php?t=display&action=contact">Contact</a>
                    </li>
                </ul>
            </nav>
EOT;
        }
        $html .= <<<EOT
                         
            <div id="lien" class="RS">
                <a href="#">
                    <img  alt="page Facebook" src="./ui/img/logo_Facebook.png" />
                </a>
                <a href="#">
                    <img alt="page Twitter" src="./ui/img/logo_Twitter.png" />
                </a>
                <a href="#">
                    <img alt="page Ullule" src="./ui/img/logo_Ullule.png" />
                </a>
                <a href="#">
                    <img alt="page Youtube" src="./ui/img/logo_Youtube.png" />
                </a>
            </div>
EOT;
        return $html;
    }
    
    public static function displayContact()
    {
       $html = '<div id="contenu">';
        $html .= <<<EOT
                <form method="post" action="">
 
                    <fieldset>
                        <legend>Contact</legend> 

                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" />
                        
                        <br/>
                
                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" id="prenom" />
                        
                        <br/>
                
                        <label for="email">E-mail :</label>
                        <input type="email" name="email" id="email" />
                                            
                        <br/>
                
                        <label for="objet">Objet :</label>
                        <select name="objet" id="objet">
                            <option value="question">Question</option>
                            <option value="participer">Participer</option>
                            <option value="autre">Autre</option>
                        </select>
                        
                        <br/>
                
                        <label for="demande">Demande :</label>
                        <textarea name="demande" id="demande" cols="40" rows="4"></textarea>
                                                
                        <br/>
                
                        <input type="submit" value="Envoyer" />
                    </fieldset>
                </form>
EOT;
        $html .='</div>';
        return $html;
    }
    
    public static function displayRight()
    {
        //
    }

    public static function displayFooter()
    {
        $html = <<<EOT
            <div id="footer">
                <a href="#">Mentions L&eacute;gales</a> - <a href="#">Contact</a>
            </div>
EOT;
        return $html;
    }
}
