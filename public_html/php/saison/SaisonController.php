<?php

namespace Saison;

class SaisonController
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

    public function allSaisons()
    {
        $saison = SaisonDb::getAllSaisons($this->db);
        $content = SaisonHtml::displaySaisons($saison);
        
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function voirSaison()
    {
        $id = $this->request->getGetParam("id");
        $videos = \Video\VideoDb::getEpisodesSaison($this->db, $id);
        $content = \Video\VideoHtml::displayVideos($videos);
        $this->response->setPart("content", $content);
        return $this->response;
    }
}
