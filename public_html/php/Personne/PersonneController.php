<?php

namespace Video;

class VideoController
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
        $personne = Personne::initialize(array());
        $content = PersonneHtml::displayPersonne($personne);
        $this->response->setPart("content", $content);
        return $this->response;
    }

}
