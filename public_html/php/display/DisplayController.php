<?php

namespace Display;

class DisplayController
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
    
    public function contact(){
        $content = Display::displayContact();
        $this->response->setPart("content", $content);
        return $this->response;
    }
}