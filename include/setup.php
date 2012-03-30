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
require_once 'include/database/DataBaseManager.php';
require_once 'include/mvc/Application.php';
require_once 'include/mvc/Controller.php';
require_once 'include/mvc/View.php';
require_once 'include/mvc/Model.php';


$config = array('default_action' => 'index', 'database' => 'files/db/database.json');
$db = new DataBaseManager();

function get_entity_name($module)
{
    return ucfirst(substr($module,0,-1));
}