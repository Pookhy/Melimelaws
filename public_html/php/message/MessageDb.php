<?php

namespace Message;

class MessageDb {

    public static function getMessage($db, $id) {
        $query = " SELECT * "
                . " FROM message "
                . " WHERE id_Message = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        
        try {
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $message = Message::initialize($result[0]);
            return $message;
        } catch (\PDOException $ex) {
            return false;
        }
    }
    
    public static function getAllMessages($db) {
        $query = " SELECT * "
                . " FROM message "
                . " ORDER BY date_Message DESC ";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                $messages[] = Message::initialize($result);
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
                . " LIMIT $nb";

        $statement = $db->prepare($query);
        try {
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $result) {
                $messages[] = Message::initialize($result);
            }

            return $messages;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    // ADMIN

    public static function insertMessage($db, $message) {

        $query = " INSERT INTO message "
                . " VALUES ('', :date, :contenu, :idPersonne) ";
        $statement = $db->prepare($query);
        $statement->bindValue(":date", $message->getDate());
        $statement->bindValue(":contenu", $message->getContenu());
        $statement->bindValue(":idPersonne", $message->getIdPersonne());

        try {
            $statement->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (\PDOException $ex) {
            return false;
        }
    }
    
    public static function updateMessage($db, $message) {
        $query = " UPDATE message "
                . " SET id_Message = :id, "
                . "     date_Message = :date, "
                . "     contenu_Message = :contenu, "
                . "     id_Personne = :idPersonne "
                . " WHERE id_Message = :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $message->getId());
        $statement->bindValue(":date", $message->getDate());
        $statement->bindValue(":contenu", $message->getContenu());
        $statement->bindValue(":idPersonne", $message->getIdPersonne());

        try {
            $statement->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (\PDOException $ex) {
            echo $ex;
            return false;
        }
    }

    public static function deleteMessage($db, $id) {

        $query = " DELETE FROM message "
                . " WHERE id_Message = :id ";
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
