<?php

namespace Message;

class SaisonDb {

    public static function getAllMessages($db) {
        $query = " SELECT * "
                . " FROM message "
                . " ORDER BY date_Message ";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $messages[] = Video::initialize($result);
            }

            return $messages;
        } catch (\PDOException $ex) {
            return false;
        }
    }

    public static function getXMessages($db, $nb) {
        $query = " SELECT * "
                . " FROM message "
                . " ORDER BY date_Message "
                . " LIMIT :nbMessage";

        $statement = $db->prepare($query);
        $statement->bindValue(":nbMessage", $nb);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $messages[] = Video::initialize($result);
            }

            return $messages;
        } catch (\PDOException $ex) {
            return false;
        }
    }

}
