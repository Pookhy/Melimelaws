<?php

namespace Personne;

class PersonneController
{
    private $db;
    private $request;
    private $response;

    public function __construct($db, $request, $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->db = $db;
    }

    public function allPersonne()
    {
        $personnes = Personne::initialize(array());
        $content = PersonneHtml::displayPersonne($personnes);
        $this->response->setPart("content", $content);
        return $this->response;
    }
    
    public function allEquipe()
    {
        $personnes = PersonneDb::getEquipes($this->db);
        var_dump($personnes);
        $content = PersonneHtml::displayPersonnes($personnes);
        $this->response->setPart("content", $content);
        return $this->response;
    }
    
    public function allGuest()
    {
        $personnes = PersonneDb::getGuest($this->db);
        $content = PersonneHtml::displayPersonnes($personnes);
        $this->response->setPart("content", $content);
        return $this->response;
    }
    
    public function diffEquipe()
    {
        $content = PersonneHtml::displayChoixTypePersonne();
        $this->response->setPart("content", $content);
        return $this->response; 
    }
    
    public function login()
    {
        $auth = \User\AuthManager::getInstance();
        try {
            $auth->checkAuthentication($this->db, $this->request->getPostParam("username"), $this->request->getPostParam("password"));
            $content = "Vous êtes maintenant connecté, bienvenue " . $auth->getUsername();
        } catch (AuthException $ex) {
            $content = $ex->getMessage();
        }
        $this->response->setPart("content", $content);
        return $this->response;
    }

}
