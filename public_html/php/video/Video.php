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

    public function __construct($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison, $numSaison){
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

    public function getId(){
        return $this->id;
    }

    public function getNum(){
        return $this->num;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getType(){
        return $this->type;
    }

    public function getAccueil(){
        return $this->accueil;
    }

    public function getIdSaison(){
        return $this->idSaison;
    }
    
    public function getNumSaison(){
        return $this->numSaison;
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
    
    public function setNumSaison($numSaison) {
        $this->numSaison = $numSaison;
    }
    
    public static function initialize($raw = array()){
        if(isset($raw['id_Video']) && trim($raw['id_Video'])){
            $id = $raw['id_Video'];            
        }else{
            $id = null;
        }

        if(isset($raw['num_Video']) && trim($raw['num_Video'])){
            $num = $raw['num_Video'];            
        }else{
            $num = null;
        }

        if(isset($raw['titre_Video']) && trim($raw['titre_Video'])){
            $titre = $raw['titre_Video'];            
        }else{
            $titre = null;
        }

        if(isset($raw['description_Video']) && trim($raw['description_Video'])){
            $description = $raw['description_Video'];            
        }else{
            $description = null;
        }

        if(isset($raw['adresse_Video']) && trim($raw['adresse_Video'])){
            $adresse = $raw['adresse_Video'];            
        }else{
            $adresse = null;
        }

        if(isset($raw['type_Video']) && trim($raw['type_Video'])){
            $type = $raw['type_Video'];            
        }else{
            $type = null;
        }

        if(isset($raw['accueil_Video']) && trim($raw['accueil_Video'])){
            $accueil = $raw['accueil_Video'];            
        }else{
            $accueil = null;
        }

        if(isset($raw['id_Saison']) && trim($raw['id_Saison'])){
            $idSaison = (int)$raw['id_Saison'];            
        }else{
            $idSaison = null;
        }
        
        if(isset($raw['numSaison']) && trim($raw['numSaison'])){
            $numSaison = (int)$raw['numSaison'];            
        }else{
            $numSaison = null;
        }
        
        return new self($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison, $numSaison);
    }

}
