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
                . "WHERE id_Saison=:idSaison";
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
    
    // ADMIN

    public static function insertSaison($db, $saison) {

        $query = " INSERT INTO saison "
                . " VALUES ('', :num, :photo) ";
        $statement = $db->prepare($query);
        $statement->bindValue(":num", $saison->getNum());
        $statement->bindValue(":photo", $saison->getPhoto());

        try {
            $statement->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (\PDOException $ex) {
            return false;
        }
    }
    
    public static function updateSaison($db, $saison) {
        $query = " UPDATE saison "
                . " SET id_Saison = :id, "
                . "     num_Saison = :num, "
                . "     photo_Saison = :photo "
                . " WHERE id_Saison = :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $saison->getId());
        $statement->bindValue(":num", $saison->getNum());
        $statement->bindValue(":photo", $saison->getPhoto());

        try {
            $statement->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (\PDOException $ex) {
            echo $ex;
            return false;
        }
    }

    public static function deleteSaison($db, $id) {

        $query = " DELETE FROM saison "
                . " WHERE id_Saison = :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);

        try {
            $statement->execute();
            return true;
        } catch (\PDOException $ex) {
            echo 'marche pas'.$ex->getMessage();
            return false;
        }
    }

}
