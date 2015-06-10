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

    public static function getVideo($db, $id) {
        $query = " SELECT * "
                . " FROM video "
                . " WHERE id_Video = :id ";

        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);

        try {
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $video = Video::initialize($result);

            return $video;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getAllVideos($db) {
        $query = " SELECT * "
                . " FROM video "
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

    public static function insertVideo($db, $video) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);

        $query = " INSERT INTO video "
                . " VALUES ('', :num, :titre, :description, :adresse, :type, :accueil, :idSaison) ";
        $statement = $db->prepare($query);
        $statement->bindValue(":num", $video->getNum());
        $statement->bindValue(":titre", $video->getTitre());
        $statement->bindValue(":description", $video->getDescription());
        $statement->bindValue(":adresse", $video->getAdresse());
        $statement->bindValue(":type", $video->getType());
        $statement->bindValue(":accueil", $video->getAccueil());
        $statement->bindValue(":idSaison", $video->getIdSaison());

        try {
            $statement->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function deleteVideo($db, $id) {
        //($id, $num, $titre, $description, $adresse, $type, $accueil, $idSaison);

        $query = " DELETE FROM video "
                . " WHERE id = :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);

        try {
            $statement->execute();
            return true;
        } catch (\PDOException $ex) {
            return false;
        }
    }

}
