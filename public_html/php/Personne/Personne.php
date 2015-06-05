<?php

namespace Personne;

class Personne {

    protected $id;
    protected $nom;
    protected $prenom;
    protected $bio;
    protected $photo;
    protected $type;
    protected $idConnexion;
    protected $mdpConnexion;

    public function __construct($id, $nom, $prenom, $bio, $photo, $type, $idConnexion, $mdpConnexion) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->bio = $bio;
        $this->photo = $photo;
        $this->type = $type;
        $this->idConnexion = $idConnexion;
        $this->mdpConnexion = $mdpConnexion;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getBio() {
        return $this->bio;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getType() {
        return $this->type;
    }

    public function getIdConnexion() {
        return $this->idConnexion;
    }

    public function getMdpConnexion() {
        return $this->mdpConnexion;
    }

        
    public static function initialize($raw = array()) {
        if (isset($raw['id_Personne']) && trim($raw['id_Personne'])) {
            $id = $raw['id_Personne'];
        } else {
            $id = null;
        }

        if (isset($raw['nom_Personne']) && trim($raw['nom_Personne'])) {
            $nom = $raw['nom_Personne'];
        } else {
            $nom = null;
        }
        
        if (isset($raw['prenom_Personne']) && trim($raw['prenom_Personne'])) {
            $prenom = $raw['prenom_Personne'];
        } else {
            $prenom = null;
        }
        
        if (isset($raw['bio_Personne']) && trim($raw['bio_Personne'])) {
            $bio = $raw['bio_Personne'];
        } else {
            $bio = null;
        }
        
        if (isset($raw['photo_Personne']) && trim($raw['photo_Personne'])) {
            $photo = $raw['photo_Personne'];
        } else {
            $photo = null;
        }
        
        if (isset($raw['type_Personne']) && trim($raw['type_Personne'])) {
            $type = $raw['type_Personne'];
        } else {
            $type = null;
        }
        
        if (isset($raw['id_Connexion']) && trim($raw['id_Connexion'])) {
            $idConnexion = $raw['id_Connexion'];
        } else {
            $idConnexion = null;
        }
        
        if (isset($raw['mdp_Connexion']) && trim($raw['mdp_Connexion'])) {
            $mdpConnexion = $raw['mdp_Connexion'];
        } else {
            $mdpConnexion = null;
        }

        return new self($id, $nom, $prenom, $bio, $photo, $type, $idConnexion, $mdpConnexion);
    }

}
