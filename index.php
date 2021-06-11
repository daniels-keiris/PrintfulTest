<?php

require ('vendor/autoload.php');

// $loader = require 'vendor/autoload.php';
// $loader->addPsr4('', __DIR__.'/../src/');

use Controllers\TaskController;
// use Models\Task;

$taskController = new TaskController();
$taskController->taskList();

?>