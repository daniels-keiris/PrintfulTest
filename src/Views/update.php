<?php

session_start();

require ('../../vendor/autoload.php');
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

<div class="container lead">
    <div>
        <h2 class="display-4 text-center">To do list</h1>
        <h4 class="text-center">Edit</h3>
    </div>
    <div class="container">
        <form class="" method="POST"> <!-- TODO: CSRF token for forms-->
        <div>
            <label for="title">Title:</label><br>
            <input type="text" id="title" class="form-control" name="title" value="<?php echo htmlspecialchars($task['title'], ENT_QUOTES) ?>"/> <label for="error" id="error" class=""></label>
        </div>
        <div>
            <label for="details">Description: </label><br>
            <textarea name="details" style="height:200px" class="form-control"><?php echo htmlspecialchars($task['details'], ENT_QUOTES) ?></textarea>
        </div>
        <div class="d-grid gap-2 d-flex justify-content-between">
            <button class="btn btn-lg btn-light btn-outline-dark "><a href='/index.php'>Go back</a></button>
            <button type="submit" name="delete" class="btn btn-lg btn-danger">Delete</button>
            <button type="submit" id="submit" name="update" class="btn btn-lg btn-light btn-outline-dark">Save</button>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script> // A function that triggers when the Add button is pressed and checks if the Title input field is filled or not
    $('#submit').click(function() {
        if($('#title').val() == '') {
            $('#error').text("Title cannot be blank!").show();
            $('#error').attr('class', 'alert alert-danger');
            return false;
        } else {
            $('#error').hide();
        }
    })
</script>

<?php

require_once "footer.php";

?>