<?php
require_once 'include/database/DataBaseManager.php';
require_once 'include/mvc/Application.php';
require_once 'include/mvc/Controller.php';
require_once 'include/mvc/View.php';
require_once 'include/mvc/Model.php';


$config = array('default_action' => 'index', 'database' => 'files/db/database.json');
$db = new DataBaseManager();
