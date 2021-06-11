<?php

require ('vendor/autoload.php');

use Controllers\TaskController;

$taskController = new TaskController();
$taskController->taskList();

?>