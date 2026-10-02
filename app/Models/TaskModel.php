<?php
namespace App\Models;
use CodeIgniter\Model;

class TaskModel extends Model {
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    // Get tasks for today's date
    public function getTodayTasks() {
        $today = date('Y-m-d');
        return $this->where('task_date', $today)->findAll();
    }

    // Get all tasks ordered by date
    public function getAllTasksOrdered() {
        return $this->orderBy('task_date', 'ASC')->findAll();
    }
}