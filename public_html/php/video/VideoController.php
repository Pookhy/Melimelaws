<?php

namespace Video;

class VideoController {

    private $db;
    private $request;
    private $response;

    public function __construct($db, $request, $response) {
        $this->request = $request;
        $this->response = $response;
        $this->db = $db;
    }

    public function home() {
        $videos = VideoDb::getVideosAccueil($this->db);
        $content = VideoHtml::displayVideos($videos);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    
    
    //          ADMIN
    
    public function formInsertVideo() {
        $saisons = \Saison\SaisonDb::getAllSaisons($this->db);
        $content = VideoHtml::displayInsertVideo($saisons);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function insertVideo() {
        $values = $this->request->getAllPostParams();
        if ( (  isset($values["num_Video"]) && (!empty($values["num_Video"])) ) 
            && (isset($values["titre_Video"]) && (!empty($values["titre_Video"]))   ) 
            && (isset($values["description_Video"]) && (!empty($values["description_Video"]))   ) 
            && (isset($values["adresse_Video"]) && (!empty($values["adresse_Video"])) )
            && (isset($values["type_Video"]) && (!empty($values["type_Video"])) )
            && (isset($values["accueil_Video"]) && ( $values["accueil_Video"]=="1" || $values["accueil_Video"] == "0" ) )
            && (isset($values["id_Saison"]) && (!empty($values["id_Saison"]))   )
        ) {
            $video = Video::initialize($values);
            $id = VideoDb::insertVideo($this->db, $video);  
        } else {
            echo "il manque un element : \n";
        }
        
        $videos = VideoDb::getAllVideos($this->db);
        foreach ($videos as $video) {
            $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
            $video->setNumSaison($saison->getNum());
        }
        $content = VideoHtml::displayAdminVideos($videos);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function deleteVideo() {
        $id = $this->request->getGetParam("id");
        VideoDb::deleteVideo($this->db, $id);
        header('Location: ' . "./index.php?t=video&action=seeAllVideos");
    }

    public function formUpdateVideo() {
        $id = $this->request->getGetParam("id");
        $video = VideoDb::getVideo($this->db, $id);

        $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
        $video->setNumSaison($saison->getNum());

        $saisons = \Saison\SaisonDb::getAllSaisons($this->db);
        
//        $messages = MessageDb::getXMessages($this->db, $nb);
//        $content = MessageHtml::displayMessages($messages); 
//        $this->response->setPart("content", $content);
//        return $this->response;
        
        $content = VideoHtml::displayFormUpdateVideo($video, $saisons);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function updateVideo() {
        $values = $this->request->getAllPostParams();
        $video = Video::initialize($values);
        $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
        $video->setNumSaison($saison->getNum());
        $update = VideoDb::updateVideo($this->db, $video);

        $videos = VideoDb::getAllVideos($this->db);
        foreach ($videos as $video) {
            $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
            $video->setNumSaison($saison->getNum());
        }
        $content = VideoHtml::displayAdminVideos($videos);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function seeAllVideos() {
        $videos = VideoDb::getAllVideos($this->db);

        foreach ($videos as $video) {
            $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
            $video->setNumSaison($saison->getNum());
        }
        $content = VideoHtml::displayAdminVideos($videos);
        $this->response->setPart("content", $content);
        return $this->response;
    }

}
