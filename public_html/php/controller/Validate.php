<?php

namespace Controller;

class Validate{
    public static function validate($array){
        foreach($array as $value){
            if(is_array($value)){
                return self::validate($value);
            }else{
                
            }
        }
    }
}