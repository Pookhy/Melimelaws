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
        $saison = SaisonDb::getAllSaisons($this->db);
        $content = SaisonHtml::displaySaisons($saison);
        
        $this->response->setPart("content", $content);
        return $this->response;
    }

}
