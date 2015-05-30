<?php

namespace Saison;

class Saison
{
    protected $id;
    protected $num;
    protected $photo;

    public function __construct($id, $num, $photo) {
        $this->id = $id;
        $this->num = $num;
        $this->photo = $photo;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getNum() {
        return $this->num;
    }

    public function getPhoto() {
        return $this->photo;
    }

        

    
    public static function initialize($raw = array()){
        if(isset($raw['id_Saison']) && trim($raw['id_Saison']) != ""){
            $id = $raw['id_Saison'];            
        }else{
            $id = null;
        }

        if(isset($raw['num_Saison']) && trim($raw['num_Saison']) != ""){
            $num = $raw['num_Saison'];            
        }else{
            $num = null;
        }

        if(isset($raw['photo_Saison']) && trim($raw['photo_Saison']) != ""){
            $photo = $raw['photo_Saison'];            
        }else{
            $photo = null;
        }
        
        return new self($id, $num, $photo);
    }

}
