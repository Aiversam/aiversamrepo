<?php
namespace App\Models;
use CodeIgniter\Model;

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController {
    
    // Welcome Page (/) - Shows only today's tasks
    public function index() {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTodayTasks();
        return view('welcome_message', $data);
    }

    // Task List Page (/tasks) - Shows all tasks ordered by date
    public function tasks() {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getAllTasksOrdered();
        return view('task_list', $data);
    }

    // Profile Page (/profile) - Shows the single user record
    public function profile() {
        $userModel = new UserModel();
        $data['user'] = $userModel->getDemoUser();
        return view('profile', $data);
    }

    // About Page (/about) - Static page identifying the developer
    public function about() {
        return view('about');
    }
}