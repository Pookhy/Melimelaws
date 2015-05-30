<?php

namespace Video;

class VideoDb
{

    public static function getVideosAccueil($db)
    {
        $query = "ta query";

        $statement = $db->prepare($query);
        $statement = execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $videos[] = Video::initialize($result);
        }

        return $videos;
    }

}
