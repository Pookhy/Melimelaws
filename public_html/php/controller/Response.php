<?php

namespace Controller;

class Response
{
    /**
     * @var array $parts le tableau des parties de HTML qui pourront être utilisées
     */
    protected $parts;

    public function __construct($parts = array())
    {
        $this->parts = $parts;
        $this->parts['squelette'] = "/ui/pages/home.html";
    }

    /**
     * ajouter une partie
     */
    public function setPart($key, $content)
    {
        $this->parts[$key] = $content;
    }

    public function getPart($key)
    {
        if (isset($this->parts[$key])) {
            return $this->parts[$key];
        } else {
            throw new \Exception("Partie {$key} non existante");
        }
    }

}
