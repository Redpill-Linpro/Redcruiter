<?php

class Application 
{

    public $action;
    public $controller;
    private $module;

    public function __construct()
    {
        $this->module = 'Start';
        $this->action = 'list';
    }

    public function execute()
    {
        global $config;

        if(isset($_REQUEST['module']) && !empty($_REQUEST['module']))
            $this->module = $_REQUEST['module'];

        if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
            $this->action = $_REQUEST['action'];

        $this->controller = $this->loadController();
        $this->controller->setupView($this->action);
        $this->controller->loadEntity();

        if(method_exists($this->controller, 'action_'.$this->action))
            $this->controller->{'action_'.$this->action}();
        else
            $this->controller->{'action_'.$config['default_action']}();
    }

    private function loadController()
    {
        $class = 'Controller'.ucfirst($this->module);
        $path = "modules/$this->module/$class.php";

        if(!file_exists($path))
            return new Controller($this->module);

        require_once $path;

        return new $class($this->module);
    }
}