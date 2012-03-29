<?php

class Controller
{
    protected $module;
    protected $view;
    protected $entity;


    public function __construct($module)
    {
        $this->module = $module;
    }

    final public function setupView($action)
    {
        $class = 'View'.ucfirst($action);
        $path = "modules/$this->module/$class.php";

        if(!file_exists($path))
            $this->view = new View();

        if(!isset($this->view))
        {
            require_once $path;
            $this->view = new $class(); 
        }

        $this->view->initSmarty();
    }

    public function action_index()
    {
        $this->view->display();
    }
}