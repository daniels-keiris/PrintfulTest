<?php

namespace Models;

use Setup\Db\DbConnection;

class Task 
{
    /**
     * ID of task
     */
    public $id;

    /**
     * Title for the task
     */
    public $title;

    /**
     * Task details
     */
    public $details;

    private $dbConnection;

    /**
     * Init database connection
     */
    public function __construct() 
    {
        $database = new DbConnection();
        $this->dbConnection = $database->connect();
    }

    /**
     * Get all tasks
     */
    public function getAllTasks() 
    {
        $rawQuery = 'SELECT * FROM tasks';
        $results = $this->dbConnection->query($rawQuery, MYSQLI_USE_RESULT);
        return $results;
    }

    /**
     * Get task by ID
     */
    public function getTaskById($taskId)
    {
        $rawQuery = "SELECT * FROM tasks WHERE id = '$taskId'";
        $result = $this->dbConnection->query($rawQuery);

        return $result->fetch_assoc();
    }
    /**
     * Create a new Task
     */
    public function createNewTask($title, $details) 
    {
        $rawQuery = "INSERT INTO tasks (title, details) VALUES ('$title', '$details')";
        try {
            $this->dbConnection->query($rawQuery);
        } catch (Exception $e) {
            die($e);
        }
    }
    /**
     * Update task with new information
     */
    public function updateTask($id, $title, $details) 
    {
        $rawQuery = "UPDATE tasks SET title = '$title', details = '$details' WHERE id = '$id'";
        try {
            $this->dbConnection->query($rawQuery);
        } catch (Exception $e) {
            die($e);
        }
    }
    /**
     * Delete the task
     */
    public function deleteTask($id) 
    {
        $rawQuery = "DELETE FROM tasks WHERE id = '$id'";
        try {
            $this->dbConnection->query($rawQuery);
        } catch (Exception $e) {
            die($e);
        }
    }
    /**
     * Update status on task
     */
    public function statusTask($id, $status)
    {
        error_log($status);
        $rawQuery = "UPDATE tasks SET done = '$status' WHERE id = '$id'";
        try {
            $this->dbConnection->query($rawQuery);
        } catch (Exception $e) {
            die($e);
        }
    }
}

?>