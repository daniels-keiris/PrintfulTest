<?php

require ('../../vendor/autoload.php');

use Controllers\TaskController;

$id = isset($_POST['id']) ? $_POST['id'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
// Check if ID exists and Status is not NULL
if ($id && !is_null($status)) {
    (new TaskController)->editTaskStatus($id, $status);
}

?>