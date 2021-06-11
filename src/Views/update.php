<?php

session_start();

require ('../../vendor/autoload.php'); // TODO: without this create submit does not work, fix when possible w/ proper autoload
require_once "header.php";

use Controllers\TaskController;

// Get task ID from query string params
$taskId = isset($_GET['id']) ? $_GET['id'] : null;

if ($taskId) {
    $task = (new TaskController)->getTask($taskId);
} else {
    die('Task ID not provided');
}
// In the event the Save button is pressed
if ($_POST){ 
    if (isset($_POST['update'])){ 
        $title = $_POST['title'];
        $details = $_POST['details'];
        (new TaskController)->editTask($taskId, $title, $details);
    }
}
// In the event the Delete button is pressed
if ($_POST){
    if (isset($_POST['delete'])){
        (new TaskController)->removeTask($taskId);
    }
}

?>

<div class="container">
    <div>
        <h2 class="display-4 text-center">To do list</h1>
        <h4 class="text-center">Edit</h3>
    </div>
    <div class="container">
        <form class="" method="POST">
        <div>
            <label for="title">Title:</label><br>
            <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($task['title'], ENT_QUOTES) ?>"/>
        </div>
        <div>
            <label for="details">Description: </label><br>
            <textarea name="details" style="height:200px" class="form-control"><?php echo htmlspecialchars($task['details'], ENT_QUOTES) ?></textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex">
            <button class="btn btn-sm btn-light btn-outline-dark "><a href='/index.php'>Go back</a></button>
            <button type="submit" name="delete" class="btn btn-sm btn-danger ">Delete</button>
            <button type="submit" name="update" class="btn btn-sm btn-light btn-outline-dark">Save</button>
        </div>
        </form>
    </div>
</div>