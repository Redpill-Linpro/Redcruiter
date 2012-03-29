<?php

class Application 
{

    public $action;
    public $controller;

    public function __construct()
    {
        $this->action = 'list';
    }

    public function execute()
    {
   //     $this->controller = 
    }

    public function startSession()
    {
        
    }

    private function loadController()
    {

    }
}