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
    
    public static function initialize($raw = array()){
        if(isset($raw['id_Video']) && trim($raw['id_Video']) != ""){
            $id = $raw['id_Video'];            
        }else{
            $id = null;
        }
        
        return new self($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);
    }

}
