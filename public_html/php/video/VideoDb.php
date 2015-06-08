<?php

namespace Video;

class VideoDb {

    public static function getVideosAccueil($db) {
        $query = " SELECT * "
                . " FROM video "
                . " WHERE accueil_Video = True ";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $videos[] = Video::initialize($result);
            }

            return $videos;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getAllEpisodes($db) {
        $query = " SELECT * "
                . " FROM video "
                . " WHERE type_Video = 'episode' "
                . " ORDER BY id_Saison ";

        $statement = $db->prepare($query);


        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $videos[] = Video::initialize($result);
            }

            return $videos;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getEpisodesSaison($db, $numSaison) {
        $query = " SELECT * "
                . " FROM video INNER JOIN saison ON video.id_Saison = saison.id_Saison "
                . " WHERE type_Video = 'episode' "
                . " AND num_Saison= :numSaison "
                . " ORDER BY num_Video ";

        $statement = $db->prepare($query);
        $statement->bindValue(":numSaison", $numSaison);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $videos[] = Video::initialize($result);
            }

            return $videos;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getAllBonus($db) {
        $query = " SELECT * "
                . "FROM video"
                . "WHERE type_Video = 'bonus'"
                . "ORDER BY id_Saison";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $videos[] = Video::initialize($result);
            }

            return $videos;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getBonusSaison($db, $numSaison) {
        $query = " SELECT * "
                . "FROM video INNER JOIN saison ON video.id_Saison = saison.id_Saison"
                . "WHERE type_Video = 'bonus'"
                . "AND num_Saison= :numSaison"
                . "ORDER BY num_Video";

        $statement = $db->prepare($query);
        $statement->bindValue(":numSaison", $numSaison);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $videos[] = Video::initialize($result);
            }

            return $videos;
        } catch (\PDOException $ex) {
            return false;
        }
    }
    
    public static function insertVideo($db, $formulaire) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);
        if( (isset($_POST["num"])&& !empty($_POST["num"])) 
            && (isset($_POST["titre"])&& !empty($_POST["titre"])) )
        {
            $_POST["num"]=htmlspecialchars($_POST["num"]);
            $num = $_POST["num"];
            
            $_POST["titre"]=htmlspecialchars($_POST["titre"]);
            $titre = $_POST["titre"];
            
            $_POST["desc"]=htmlspecialchars($_POST["desc"]);
            $description = $_POST["desc"];
            
            $_POST["adr"]=htmlspecialchars($_POST["adr"]);
            $adresse = $_POST["adr"];
        
            $query = " INSERT INTO video "
                    ." VALUES ('', :) ";
            
            try {
                $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

                foreach ($results as $result) {
                    $videos[] = Video::initialize($result);
                }

                return $videos;
            } catch (\PDOException $ex) {
                return false;
            }
        }
        else{
            //message d'erreur
        }
    }

}
