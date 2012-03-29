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
        $this->view->process();
    }

    final public function loadEntity()
    {
        $class = get_entity_name($this->module);
        $path = "modules/$this->module/$class.php";

        if(!file_exists($path))
            return;

        require_once $path;

        if(!is_subclass_of($class, 'Model'))
            return;

        $this->entity = new $class();

        if(isset($_REQUEST['record']))
            $this->entity->retrieve($_REQUEST['record']);
    }

    public function action_index()
    {
        $this->view->display();
    }
}