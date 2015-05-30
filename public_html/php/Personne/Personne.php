<?php

namespace Personne;

class Personne {

    protected $id;
    protected $nom;
    protected $prenom;
    protected $bio;
    protected $photo;
    protected $idConnexion;
    protected $mdpConnection;
    
    public function __construct($id, $nom, $prenom, $bio, $photo, $idConnexion, $mdpConnection) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->bio = $bio;
        $this->photo = $photo;
        $this->idConnexion = $idConnexion;
        $this->mdpConnection = $mdpConnection;
    }

        public static function initialize($raw = array()) {
        if (isset($raw['id_Personne']) && trim($raw['id_Personne']) != "") {
            $id = $raw['id_Personne'];
        } else {
            $id = null;
        }



        return new self($id, $nom, $prenom, $bio, $photo, $idConnexion, $mdpConnection);
    }

}
