<?php

namespace Personne;

class PersonneDb {

    public static function getEquipes($db) {
        $query = " SELECT * "
                . " FROM personne "
                . " WHERE type_Personne = 'melimelaws' ";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $melimelaws[] = Personne::initialize($result);
            }

            return $melimelaws;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getGuest($db) {
        $query = " SELECT * "
                . " FROM personne "
                . " WHERE type_Personne = 'guest' ";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $guest[] = Personne::initialize($result);
            }

            return $guest;
        } catch (\PDOException $ex) {
            return false;
        }
    }

}
