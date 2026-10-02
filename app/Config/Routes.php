<?php

use App\Controllers\TaskController;

$routes->get('/', [TaskController::class, 'index']);         // Welcome page (Today's tasks)
$routes->get('/tasks', [TaskController::class, 'tasks']);     // Full Task List page
$routes->get('/profile', [TaskController::class, 'profile']); // Profile page[cite: 1]
$routes->get('/about', [TaskController::class, 'about']);     // Static About page[cite: 1]


