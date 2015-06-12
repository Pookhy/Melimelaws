<?php

namespace Message;

class Message {

    protected $id;
    protected $date;
    protected $contenu;
    protected $idPersonne;

    public function __construct($id, $date, $contenu, $idPersonne) {
        $this->id = $id;
        $this->date = $date;
        $this->contenu = $contenu;
        $this->idPersonne = $idPersonne;
    }

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getIdPersonne() {
        return $this->idPersonne;
    }

    public static function initialize($raw = array()) {
        if (isset($raw['id_Message']) && trim($raw['id_Message'])) {
            $id = $raw['id_Message'];
        } else {
            $id = null;
        }

        if (isset($raw['date_Message']) && trim($raw['date_Message'])) {
            $date = $raw['date_Message'];
        } else {
            $date = null;
        }

        if (isset($raw['contenu_Message']) && trim($raw['contenu_Message'])) {
            $contenu = $raw['contenu_Message'];
        } else {
            $contenu = null;
        }

        if (isset($raw['id_Personne']) && trim($raw['id_Personne'])) {
            $idPersonne = $raw['id_Personne'];
        } else {
            $idPersonne = null;
        }

        return new self($id, $date, $contenu, $idPersonne);
    }

}
