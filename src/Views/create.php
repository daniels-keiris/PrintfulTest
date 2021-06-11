<?php 

session_start();

require ('../../vendor/autoload.php'); // TODO: without this create submit does not work
require_once "header.php";

use Controllers\TaskController;

// In the event the Add button is pressed
if ($_POST) {
    if (isset($_POST['saveTask'])){
        $title = $_POST['title'];
        $details = $_POST['details'];
        (new TaskController)->saveTask($title, $details);
    }
}

?>

<div class="container">
    <h2 class="display-4 text-center">To do list</h1>
    <h4 class="text-center">Add new</h3>
</div>
<div class="container">
    <form class="" method="POST">
    <div>
        <label for="title">Title: </label><br>
        <input type="text" id="title" class="form-control" name="title"/>  <label for="error" id="error" class=""></label>
    </div>
    <div>
        <label for="details">Description: </label><br>
        <textarea name="details" style="height:200px" class="form-control"></textarea>
    </div>
    <div>
    <button><a href='/index.php'>Go back</a></button>
    <button type="submit" id="submit" name="saveTask" onclick="validateForm();">Add</button>
    </div>
    </form>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script>
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