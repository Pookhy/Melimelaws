<?php

namespace Personne;

class PersonneDb
{
    public static function getEquipes($db)
    {
        $query = " SELECT * "
                . "FROM personne "
                . "WHERE type = 'melimelaws'";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $melimelaws[] = Video::initialize($result);
        }

        return $melimelaws;
    }
    
    public static function getGuest($db)
    {
        $query = " SELECT * "
                . "FROM personne "
                . "WHERE type = 'guest'";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $guest[] = Video::initialize($result);
        }

        return $guest;
    }
    
    

}
