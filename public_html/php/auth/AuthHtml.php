<?php

namespace User;

class AuthHtml
{

    /**
     * Méthode afficherInformationsConnexion
     * Affiche les informations de connexion et le lien quitter
     */
    public static function getEncart()
    {
        $auth = AuthManager::getInstance();

        $html = "<div id=\"infosConnexion\" ";
        if ($auth->isConnected()) {
            $html .= " style=\"background-image:url(/DeckBuilder/public_html/ui/img/connected.png)\">";
            $html .= "Bienvenue " . $auth->getUsername() . "<br/>"
                    . "<a href=\"index.php?t=user&amp;action=seeMe&amp;id={$auth->getId()}\">Mon profil</a>"
                    . "<br/><a href=\"index.php?t=user&amp;action=logout\">Se déconnecter</a><br/>";
        } else {
            $html .= "style=\"background-image:url(/DeckBuilder/public_html/ui/img/connexion.png)\">";
            $html .= <<<EOT
                <form action="index.php?t=user&amp;action=login" method="POST">
                    <div id="champsFormConnexion">
                        <input id="userName" type="text" name="username" placeholder="Login"/><br>
                        <input id="password" type="password" name="password" placeholder="Mot de passe"/><br/>
                        <a href="index.php?t=form&amp;action=formRegister">Pas encore de compte ?</a>
                    </div>
                    <input id="submitConnexion" type="submit" value="Se connecter"/>
                </form>
EOT;
        }
        $html .= "</div>";
        return $html;
    }

    /**
     * Méthode afficherFormulaireConnexion
     * Affiche le formualire de connexion
     * Prend en paramètre l'URL de l

      'action
     */
    public function afficherFormulaireConnexion($urlAction)
    {
//        $nameLogin = AuthManager::LOGIN_KEYWORD;
//        $namePwd = AuthManager::PWD_KEYWORD;

        $html = <<<EOT
        <form action="{$urlAction}" method="post">
        <div>
        Login : <input type="text" id= "authlogin" name="username" value="" size="8" /><br />
        Password : <input type="password" id="authpwd" name="password" value="" size="8" /><br />
        <input type="submit" name="envoi" value="Envoi" />
        </div>
        </form>
EOT;

        return $html;
    }

    public static function seeUser()
    {
        $auth = AuthManager::getInstance();
        $html = <<<EOT
                    <h2>{$auth->getUsername()}</h2>
                    <a href="index.php?t=form&amp;action=updateProfile">Modifier mon profil</a><br/>
                    <div id="leftContentUser" style="background-image:url(/DeckBuilder/public_html/ui/img/description.png">
                        {$auth->getDescription()}
                    </div>
                    <div id="rightContentUser">
                        Sexe : {$auth->getSexe()}<br/>
                        <a href="{$auth->getLink()}">Mon site web</a>
                    </div>
                    
EOT;

        return $html;
    }

}
