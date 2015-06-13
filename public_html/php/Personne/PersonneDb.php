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
    
    public static function getPersonne($db, $id) {
        $query = " SELECT * "
                . " FROM personne "
                . " WHERE id_Personne = :id ";

        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);

        try {
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $personne = Personne::initialize($result[0]);

            return $personne;
        } catch (\PDOException $ex) {
            return false;
        }
    }
    
     public static function getAllPersonnes($db) {
        $query = " SELECT * "
                . " FROM personne ";

        $statement = $db->prepare($query);


        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $personnes[] = Personne::initialize($result);
            }

            return $personnes;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    // ADMIN

    public static function insertPersonne($db, $personne) {

        $query = " INSERT INTO personne "
                . " VALUES ('', :nom, :prenom, :bio, :photo, :type, :idConnexion, :mdpConnexion) ";
        $statement = $db->prepare($query);
        $statement->bindValue(":nom", $personne->getNom());
        $statement->bindValue(":prenom", $personne->getPrenom());
        $statement->bindValue(":bio", $personne->getBio());
        $statement->bindValue(":photo", $personne->getPhoto());
        $statement->bindValue(":type", $personne->getType());
        $statement->bindValue(":idConnexion", $personne->getIdConnexion());
        $statement->bindValue(":mdpConnexion", $personne->getMdpConnexion());

        try {
            $statement->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (\PDOException $ex) {
            return false;
        }
    }
    
    public static function updatePersonne($db, $personne) {
        $query = " UPDATE personne "
                . " SET id_Personne = :id, "
                . "     nom_Personne = :nom, "
                . "     prenom_Personne = :prenom, "
                . "     bio_Personne = :bio, "
                . "     photo_Personne = :photo, "
                . "     type_Personne = :type, "
                . "     id_Connexion = :idConnexion, "
                . "     mdp_Connexion = :mdpConnexion "
                . " WHERE id_Personne = :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $personne->getId());
        $statement->bindValue(":nom", $personne->getNom());
        $statement->bindValue(":prenom", $personne->getPrenom());
        $statement->bindValue(":bio", $personne->getBio());
        $statement->bindValue(":photo", $personne->getPhoto());
        $statement->bindValue(":type", $personne->getType());
        $statement->bindValue(":idConnexion", $personne->getIdConnexion());
        $statement->bindValue(":mdpConnexion", $personne->getMdpConnexion());

        try {
            $statement->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (\PDOException $ex) {
            echo $ex;
            return false;
        }
    }

    public static function deletePersonne($db, $id) {

        $query = " DELETE FROM personne "
                . " WHERE id_Personne = :id ";
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
