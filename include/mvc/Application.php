<?php
/**
 * @copyright 2011 Redpill Linpro AB.
 * @author Jonas Odencrants
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
        $class = get_entity_name($this->module).'Controller';
        $path = "modules/$this->module/$class.php";

        if(!file_exists($path))
            return new Controller($this->module);

        require_once $path;

        return new $class($this->module);
    }
}