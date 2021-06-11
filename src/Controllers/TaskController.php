<?php

namespace Controllers;

require_once( $_SERVER['DOCUMENT_ROOT'] . '/src/Helpers/ViewHelper.php');

use Models\Task;

class TaskController 
{
    
    private $task;
    /**
     * Create a new Task
     */
    public function __construct()
    {
        $this->task = new Task();
    }
    /**
     * Get all the tasks and pass the variable to the view
     */
    public function taskList()
    {
        $tasks = $this->task->getAllTasks();
        view('index', compact('tasks'));
    }
    /**
     * Save the task and upon completion return to index page
     */
    public function saveTask($title, $details)
    {
        $this->task->createNewTask($title, $details);
        header('location: /index.php');
    }
    /**
     * Get a specific task by its ID
     */
    public function getTask($taskId)
    {
        $task = $this->task->getTaskById($taskId);
        return $task;
    }
    /**
     * Edit a task and upon completion return to index page
     */
    public function editTask($id, $title, $details)
    {
        $this->task->updateTask($id, $title, $details);
        header('location: /index.php');
    }
    /**
     * Remove a task by its ID and return to index page
     */
    public function removeTask($id)
    {
        $this->task->deleteTask($id);
        header('location: /index.php');
    }
    /**
     * Edit the task status, either it's done or not
     */
    public function editTaskStatus($id, $status)
    {
        $this->task->statusTask($id, $status);
    }
    
}

?>