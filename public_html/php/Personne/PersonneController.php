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

    
    
    
    //          ADMIN
    
    public function formInsertPersonne() {
        $content = PersonneHtml::displayInsertPersonne();
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function insertPersonne() {
        $values = $this->request->getAllPostParams();
        
        if ((isset($values["nom_Personne"]) && !empty($values["nom_Personne"])) 
                && (isset($values["prenom_Personne"]) && !empty($values["prenom_Personne"])) 
                && (isset($values["bio_Personne"]) && !empty($values["bio_Personne"])) 
                && (isset($values["photo_Personne"]) && !empty($values["photo_Personne"])) 
                && (isset($values["type_Personne"]) && !empty($values["type_Personne"]))
        ) {
            $personne = Personne::initialize($values);
            $id = PersonneDb::insertPersonne($this->db, $personne);
        } else {
            echo "manque un truc";
        }
        $personnes = PersonneDb::getAllPersonnes($this->db);
        $content = PersonneHtml::displayAdminPersonnes($personnes);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function deletePersonne() {
        $id = $this->request->getGetParam("id");
        PersonneDb::deletePersonne($this->db, $id);

        $url = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $url);
    }

    public function formUpdatePersonne() {
        $id = $this->request->getGetParam("id");
        $personne = PersonneDb::getPersonne($this->db, $id);
        
//        $messages = MessageDb::getXMessages($this->db, $nb);
//        $content = MessageHtml::displayMessages($messages); 
//        $this->response->setPart("content", $content);
//        return $this->response;
        
        $content = PersonneHtml::displayFormUpdatePersonne($personne);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function updatePersonne() {
        $values = $this->request->getAllPostParams();
        $personne = Personne::initialize($values);
        $ajout = PersonneDb::updatePersonne($this->db, $personne);

        $personnes = PersonneDb::getAllPersonnes($this->db);
        $content = PersonneHtml::displayAdminPersonnes($personnes);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function seeAllPersonnes() {
        $personnes = PersonneDb::getAllPersonnes($this->db);
        $content = PersonneHtml::displayAdminPersonnes($personnes);
        $this->response->setPart("content", $content);
        return $this->response;
    }
    
}
