<?php

namespace Message;

class SaisonDb
{    
    public static function getAllMessages($db)
    {
        $query = " SELECT * "
                . "FROM message"
                . "ORDER BY date_Message";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $messages[] = Video::initialize($result);
        }

        return $messages;
    }
    
    public static function getUnMessage($db)
    {
        $query = " SELECT * "
                . "FROM message"
                . "ORDER BY date_Message"
                . "LIMIT 1";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $messages[] = Video::initialize($result);
        }

        return $messages;
    }
    
    public static function getQuatreMessages($db)
    {
        $query = " SELECT * "
                . "FROM message"
                . "ORDER BY date_Message"
                . "LIMIT 4";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $messages[] = Video::initialize($result);
        }

        return $messages;
    }
}
