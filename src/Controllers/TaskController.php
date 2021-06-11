<?php

namespace Controllers;

// require ('vendor/autoload.php');
require_once( $_SERVER['DOCUMENT_ROOT'] . '/src/Helpers/ViewHelper.php');

// use Helpers\ViewHelper;
use Models\Task;

class TaskController 
{
    // TODO: all controller actions
    private $task;

    public function __construct()
    {
        $this->task = new Task();
    }

    public function taskList()
    {
        $tasks = $this->task->getAllTasks();
        view('index', compact('tasks'));
    }

    public function saveTask($title, $details)
    {
        $this->task->createNewTask($title, $details);
        header('location: /index.php');
    }

    public function getTask($taskId)
    {
        $task = $this->task->getTaskById($taskId);

        return $task;
    }

    public function editTask($id, $title, $details)
    {
        $this->task->updateTask($id, $title, $details);
        header('location: /index.php');
    }

    public function removeTask($id)
    {
        $this->task->deleteTask($id);
        header('location: /index.php');
    }

    public function editTaskStatus($id, $status)
    {
        $this->task->statusTask($id, $status);
    }
    
}

?>