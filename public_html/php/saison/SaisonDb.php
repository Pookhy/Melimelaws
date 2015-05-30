<?php

namespace Saison;

class SaisonDb
{    
    public static function getAllSaisons($db)
    {
        $query = " SELECT * "
                . "FROM saison";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $saisons[] = Video::initialize($result);
        }

        return $saisons;
    }
    
    public static function getSaison($db, $numSaison)
    {
        $query = " SELECT * "
                . "FROM saison "
                . "WHERE num_Saison='".$numSaison."'";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $saisons[] = Video::initialize($result);
        }

        return $saisons;
    }
}
