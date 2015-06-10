<?php

namespace Video;

class Video
{
    protected $id;
    protected $num;
    protected $titre;
    protected $description;
    protected $adresse;
    protected $type;
    protected $accueil;
    protected $idSaison;
    protected $numSaison;

    public function __construct($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison)
    {
        $this->id = $id;
        $this->num = $num;
        $this->titre = $titre;
        $this->description = $description;
        $this->adresse = $adresse;
        $this->type = $type;
        $this->accueil = $accueil;
        $this->idSaison = $idSaison;
        $this->numSaison = $numSaison;
    }
    public function getNumSaison() {
        return $this->numSaison;
    }

    public function setNumSaison($numSaison) {
        $this->numSaison = $numSaison;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNum()
    {
        return $this->num;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAccueil()
    {
        return $this->accueil;
    }

    public function getIdSaison()
    {
        return $this->idSaison;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNum($num) {
        $this->num = $num;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setAccueil($accueil) {
        $this->accueil = $accueil;
    }

    public function setIdSaison($idSaison) {
        $this->idSaison = $idSaison;
    }
    
    public static function initialize($raw = array()){
        if(isset($raw['id']) && trim($raw['id'])){
            $id = $raw['id'];            
        }else{
            $id = null;
        }

        if(isset($raw['num']) && trim($raw['num'])){
            $num = $raw['num'];            
        }else{
            $num = null;
        }

        if(isset($raw['titre']) && trim($raw['titre'])){
            $titre = $raw['titre'];            
        }else{
            $titre = null;
        }

        if(isset($raw['description']) && trim($raw['description'])){
            $description = $raw['description'];            
        }else{
            $description = null;
        }

        if(isset($raw['adresse']) && trim($raw['adresse'])){
            $adresse = $raw['adresse'];            
        }else{
            $adresse = null;
        }

        if(isset($raw['type']) && trim($raw['type'])){
            $type = $raw['type'];            
        }else{
            $type = null;
        }

        if(isset($raw['accueil']) && trim($raw['accueil'])){
            $accueil = $raw['accueil'];            
        }else{
            $accueil = null;
        }

        if(isset($raw['idSaison']) && trim($raw['idSaison'])){
            $idSaison = $raw['idSaison'];            
        }else{
            $idSaison = null;
        }
        
        return new self($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);
    }

}
