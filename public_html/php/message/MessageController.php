<?php

namespace Message;

class MessageController
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
        $message = Message::initialize(array());
        $content = MessageHtml::displayMessage($message);
        $this->response->setPart("content", $content);
        return $this->response;
    }

}
