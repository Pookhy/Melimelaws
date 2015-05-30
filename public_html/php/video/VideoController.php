<?php

namespace Video;

class VideoController
{

    private $db;
    private $request;
    private $response;

    public function __construct($db, $request, $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->db = $db;
    }

    public function home()
    {
        $videos = Video::getVideosAccueil($this->db);
        $content = VideoHtml::displayVideos($videos);
        $this->response->setPart("content", $content);
        return $this->response;
    }

}
