<?php

namespace Controller;

class FrontController
{
    protected $classController;
    protected $action;
    protected $db;

    public function __construct($db, $request)
    {
        $this->db = $db;
        try {
            $t = $request->getGetParam("t");
        } catch (\Exception $ex) {
            $t = 'video';
        }
        try {
            $this->action = $request->getGetParam("action");
        } catch (\Exception $ex) {
            $this->action = 'home';
        }
        $t = ucfirst($t);
        $this->classController = $t . "\\" . $t . "Controller";
    }

    public function run($request, $response)
    {
        $controller = new $this->classController($this->db, $request, $response);
        return $controller->{$this->action}();
    }

}
