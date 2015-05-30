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

    public function home()
    {
        $video = Video::initialize(array());
        $content = VideoHtml::displayVideo($video);
        $this->response->setPart("content", $content);
        return $this->response;
    }

}
