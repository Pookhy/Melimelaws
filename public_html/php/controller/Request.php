<?php

namespace Controller;

class Request
{
    // données GET / POST
    protected $params;

    public function __construct($get, $post, $files)
    {
        $this->params['get'] = $get;
        $this->params['post'] = $post;
        $this->params['files'] = $files;
    }

    public function setGetParam($key, $value)
    {
        $this->params['get'][$key] = $value;
        return $this;
    }

    public function setPostParam($key, $value)
    {
        $this->params['post'][$key] = $value;
        return $this;
    }

    public function getGetParam($key)
    {
        if (!isset($this->params['get'][$key])) {
            throw new \Exception("Paramètre '{$key}' non existant");
        }
        return $this->params['get'][$key];
    }

    public function getPostParam($key)
    {
        if (!isset($this->params['post'][$key])) {
            throw new \Exception("Paramètre '{$key}' non existant");
        }
        return $this->params['post'][$key];
    }

    public function getFilesParam($key)
    {
        if (!isset($this->params['files'][$key])) {
            throw new \Exception("Paramètre '{$key}' non existant");
        }
        return $this->params['files'][$key];
    }

    public function getAllGetParams()
    {
        return $this->params['get'];
    }

    public function getAllPostParams()
    {
        return $this->params['post'];
    }

    public function getAllFilesParams()
    {
        return $this->params['files'];
    }

    public function isXhr()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }

}
