<?php

namespace Saison;

class SaisonController
{
    private $db;
    private $request;
    private $response;

    public function __construct($db, $request, $response){
        $this->request = $request;
        $this->response = $response;
        $this->db = $db;
    }

    public function allSaisons(){
        $allSaisons = SaisonDb::getAllSaisons($this->db);
        foreach ($allSaisons as $saison) {
            if(\Video\VideoDb::getEpisodesSaison($this->db, $saison->getId()) != false){
                $saisons[] = $saison;
            }
        }
        $content = SaisonHtml::displaySaisons($saisons);
        
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function voirSaison(){
        $id = $this->request->getGetParam("id");
        $videos = \Video\VideoDb::getEpisodesSaison($this->db, $id);
        $content = \Video\VideoHtml::displayVideos($videos);
        $this->response->setPart("content", $content);
        return $this->response;
    }
    
    //          ADMIN
    public function formInsertSaison() {
        $content = SaisonHtml::displayInsertSaison();
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function insertSaison() {
        $values = $this->request->getAllPostParams();
        
        if ((isset($values["num_Saison"]) && !empty($values["num_Saison"])) 
                && (isset($values["photo_Saison"]) && !empty($values["photo_Saison"])) 
        ) {
            $saison = Saison::initialize($values);
            $id = SaisonDb::insertSaison($this->db, $saison);
        } else {
            echo "manque un truc";
        }
        
        $saisons = SaisonDb::getAllSaisons($this->db);
        $content = SaisonHtml::displayAdminSaisons($saisons);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function deleteSaison() {
        $id = $this->request->getGetParam("id");
        SaisonDb::deleteSaison($this->db, $id);

        $url = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $url);
    }

    public function formUpdateSaison() {
        $id = $this->request->getGetParam("id");
        $saison = SaisonDb::getSaison($this->db, $id);
        
//        $messages = MessageDb::getXMessages($this->db, $nb);
//        $content = MessageHtml::displayMessages($messages);
//        $this->response->setPart("content", $content);
//        return $this->response;
        
        $content = SaisonHtml::displayFormUpdateSaison($saison);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function updateSaison() {
        $values = $this->request->getAllPostParams();
        $saison = Saison::initialize($values);
        $ajout = SaisonDb::updateSaison($this->db, $saison);

        $saisons = SaisonDb::getAllSaisons($this->db);
        $content = SaisonHtml::displayAdminSaisons($saisons);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function seeAllSaison() {
        $saisons = SaisonDb::getAllSaisons($this->db);
        $content = SaisonHtml::displayAdminSaisons($saisons);
        $this->response->setPart("content", $content);
        return $this->response;
    }
    
}
