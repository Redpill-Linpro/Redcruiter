<?php
require_once 'include/mvc/Application.php';
require_once('include/entryPoint.php');

$app = new Application();
$app->startSession();
$app->execute();