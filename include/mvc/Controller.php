<?php
/**
 * Copyright 2011 Redpill Linpro AB.
 * 
 * This file is part of Redcruiter.
 *
 * Redcruiter is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * Redcruiter is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Redcruiter. If not, see <http://www.gnu.org/licenses/>.
 */
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