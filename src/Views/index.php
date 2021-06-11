<?php 

session_start();

require_once "header.php";

use Controllers\TaskController;
use Models\Task;
use Setup\Db\DbConnection;

?>

<div class="container">
    <h2 class="display-4 text-center">To Do List</h1>
</div>

<div class="container">
    <?php foreach ($tasks as $task): ?>
    <table style="width:60%; border:1px solid black" class="table table-sm mx-auto mt-5 lead">
        <tr>
            <td class="col-8"><input type="checkbox" class="p-3" name="status" id="status" value="<?php echo htmlspecialchars($task['id'], ENT_QUOTES) ?>" <?php echo htmlspecialchars($task['done'] == 1 ? 'checked' : '',  ENT_QUOTES) ?> ><?php echo htmlspecialchars($task['title'], ENT_QUOTES) ?></td>
            <td class="col-4 text-right"><?php echo htmlspecialchars($task['added_time'], ENT_QUOTES) ?></td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($task['details'], ENT_QUOTES) ?></td>
            <td class="text-right"><button class="btn btn-outline-primary"><a href="src/Views/update.php?id=<?php echo htmlspecialchars($task['id'], ENT_QUOTES) ?>">Edit</a></button></td> <!-- Passes the Task ID to Edit page to make sure the correct task is being edited -->
        </tr>
    </table>
    <?php endforeach; ?>
</div>

<div class="container text-right">
<button class="btn btn-lg btn-outline-primary"><a href="src/Views/create.php"> Create new </a></button>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script> // Changes the status of task if the checkbox is clicked 
    $(document).ready(function() {
        $("input[name='status']").click(function(e) {
            var checked = $(this).attr('checked');
            var taskid = $(this).val();
            var status = checked ? 1 : 0;

            $.ajax ({
                type: 'POST',
                url: '/src/Helpers/CheckboxHelper.php',
                data: {
                    id: taskid,
                    status: status
                }
            });                
        });
    });
</script>