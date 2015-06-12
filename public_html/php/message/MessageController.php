<?php

namespace Message;

class MessageController
{
    private $db;
    private $request;
    private $response;

    public function __construct($db, $request, $response){
        $this->request = $request;
        $this->response = $response;
        $this->db = $db;
    }

    public function allMessages(){
        $messages = MessageDb::getAllMessages($this->db);
        $content = MessageHtml::displayMessages($messages);
        
        $this->response->setPart("content", $content);
        return $this->response;
    }

    
    //          ADMIN
    
    public function formInsertMessage() {
        $content = MessageHtml::displayInsertMessage();
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function insertMessage() {
        $values = $this->request->getAllPostParams();
        $content = "";
        if ((isset($values["date_Message"]) && !empty($values["date_Message"])) 
                && (isset($values["contenu_Message"]) && !empty($values["contenu_Message"])) 
                && (isset($values["id_Personne"]) && !empty($values["id_Personne"])) 
        ) {
            $message = Message::initialize($values);
            $id = MessageDb::insertMessage($this->db, $message);
            $content = MessageHtml::displayMessage($message);
        } else {
            echo "manque un truc";
        }

        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function deleteMessage() {
        $id = $this->request->getGetParam("id");
        MessageDb::deleteMessage($this->db, $id);

        $url = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $url);
    }

    public function formUpdateMessage() {
        $id = $this->request->getGetParam("id");
        $message = MessageDb::getMessage($this->db, $id);
        
//        $messages = MessageDb::getXMessages($this->db, $nb);
//        $content = MessageHtml::displayMessages($messages); 
//        $this->response->setPart("content", $content);
//        return $this->response;
        
        $content = MessageHtml::displayFormUpdateMessage($message);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function updateMessage() {
        $values = $this->request->getAllPostParams();
        $message = Message::initialize($values);
        $ajout = MessageDb::updateMessage($this->db, $message);

        $messages = MessageDb::getAllMessages($this->db);
        $content = MessageHtml::displayAdminMessages($messages);
        $this->response->setPart("content", $content);
        return $this->response;
    }

    public function seeAllMessages() {
        $messages = MessageDb::getAllMessages($this->db);
        $content = MessageHtml::displayAdminMessages($messages);
        $this->response->setPart("content", $content);
        return $this->response;
    }
}
