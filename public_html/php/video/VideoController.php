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

    public function formInsertVideo() {
        $saisons = \Saison\SaisonDb::getAllSaisons($this->db);
        $content = VideoHtml::displayInsertVideo($saisons);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function insertVideo() {
        $values = $this->request->getAllPostParams();
        var_dump($values);
        if ((isset($values["num"]) && !empty($values["num"])) && (isset($values["titre"]) && !empty($values["titre"])) && (isset($values["description"]) && !empty($values["description"])) && (isset($values["adresse"]) && !empty($values["adresse"])) && (isset($values["type"]) && !empty($values["type"])) && (isset($values["accueil"]) && !empty($values["accueil"])) && (isset($values["idSaison"]) && !empty($values["idSaison"]))
        ) {
            
        }
        $video = Video::initialize($values);
        var_dump($video);
        $id = VideoDb::insertVideo($this->db, $video);
        $content = "";
        $this->response->setPart("content", $content);
        return $this->response;
    }
    
    public function formDeleteVideo() {
        $video = getVideo($this->db);
        $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
        $video->setNumSaison($saison->getNum());

        $content = VideoHtml::displayFormDeleteVideo($video);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function deleteVideo() {
        $values = $this->request->getGetParam("id");
        var_dump($values);
        
        VideoDb::deleteVideo($this->db,$id);
    }

    public function formUpdateVideo() {
        $video = getVideo($this->db);
        $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
        $video->setNumSaison($saison->getNum());

        $content = VideoHtml::displayFormUpdateVideo($video);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function updateVideo() {
        $video = getVideo($this->db, $id);
        $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
        $video->setNumSaison($saison->getNum());
    }

    public function seeAllVideos() {
        $videos = getAllVideos($this->db); // ERREUR ICI POURQUOI ?
       
        foreach ($videos as $video) {
            $saison = \Saison\SaisonDb::getSaison($this->db, $video->getIdSaison());
            $video->setNumSaison($saison->getNum());
        }
        $content = VideoHtml::displayAmdinVideos;
    }

}
