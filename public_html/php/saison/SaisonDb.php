<?php

namespace Saison;

class SaisonDb {

    public static function getAllSaisons($db) {
        $query = " SELECT * "
                . " FROM saison ORDER BY num_Saison ASC";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $saisons[] = Saison::initialize($result);
            }

            return $saisons;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getSaison($db, $idSaison) {
        $query = " SELECT * "
                . "FROM saison "
                . "WHERE id_Saison=:$idSaison";
        $statement = $db->prepare($query);
        $statement->bindValue(":idSaison", $idSaison);
        try {
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $saison = isset($result[0]) ? Saison::initialize($result[0]) : false;

            return $saison;
        } catch (\PDOException $ex) {
            return false;
        }
    }

}
