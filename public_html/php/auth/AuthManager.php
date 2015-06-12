<?php

namespace User;

class AuthManager
{
    protected static $auth = null;
    protected $infosAuthentification = array();

    private function __construct()
    {
        if (isset($_SESSION['infosAuthentification'])) {
            $this->infosAuthentification = $_SESSION['infosAuthentification'];
        } else {
            $this->infosAuthentification = array();
        }
    }

    private function __clone()
    {
        
    }

    public static function getInstance()
    {
        if (null === self::$auth) {
            self::$auth = new self();
        }
        return self::$auth;
    }

    /**
     * Méthode : verifierAuthentification
     * Vérifie si le couple (login, pwd) est correct
     * Si oui, remplit le tableau $this->infosAuthentification et
     * l'enregistre dans $_SESSION (méthode synchroniser())
     * Sinon, envoie une exception de type Exception_Auth
     */
    public function checkAuthentication($db, $login, $pass)
    {
        $query = "SELECT * FROM Personne WHERE id_Connexion = :login and mdp_Connexion = :password";
        $statement = $db->prepare($query);
        $statement->bindValue(":login", $login);
        $statement->bindValue(":password", $pass);
        $statement->execute();
        $data = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($data == null) {
            throw new AuthException("Le nom d'utilisateur ou le mot de passe est incorrect.");
        } else {
            $this->infosAuthentification = $data;
            $this->synchronize();
        }
    }

    public function isConnected()
    {
        return !empty($this->infosAuthentification);
    }

    /* accesseurs des données en session */

    public function getId()
    {
        return $this->infosAuthentification['id'];
    }

    public function getDescription()
    {
        return $this->infosAuthentification['description'];
    }

    public function getSexe()
    {
        return $this->infosAuthentification['sexe'];
    }

    public function getLink()
    {
        return $this->infosAuthentification['link'];
    }

    public function getUsername()
    {
        return $this->infosAuthentification['username'];
    }

    /**
     * quitter : vider les infos de session et synchroniser
     */
    public function disconnect()
    {
        $this->infosAuthentification = array();
        self::synchronize();
    }

    /**
     * Synchronisation des infos de $this->infosAuthentification avec $_SESSION
     * Méthode à changer si on utilise un autre système pour conserver les infos
     */
    private function synchronize()
    {
        $_SESSION['infosAuthentification'] = $this->infosAuthentification;
    }

}
