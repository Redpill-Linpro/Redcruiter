<?php
require_once 'include/database/DataBaseManager.php';
require_once 'include/mvc/Application.php';
require_once 'include/mvc/Controller.php';
require_once 'include/mvc/View.php';

$db = new DataBaseMocker();
$config = array('default_action' => 'index');