<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('task_date', date('Y-m-d'))
            ->findAll();

        return view('welcome_message', [
            'tasks' => $tasks
        ]);
    }

    public function tasks()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('task_list', [
            'tasks' => $tasks
        ]);
    }

    public function profile()
    {
        $userModel = new UserModel();

        $user = $userModel->first();

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Demo user not found.'
            );
        }

        return view('profile', [
            'user' => $user
        ]);
    }

    public function about()
    {
        return view('about');
    }
}