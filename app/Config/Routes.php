<?php

use App\Controllers\TaskController;
use App\Controllers\CustomerController;
use App\Controllers\UserController;

$routes->get('/', [TaskController::class, 'index']);         // Welcome page (Today's tasks)
$routes->get('tasks', [TaskController::class, 'tasks']);
$routes->get('profile', [TaskController::class, 'profile']);
$routes->get('about', [TaskController::class, 'about']);

$routes->get('customers', [CustomerController::class, 'index']);
$routes->get('customers/new', [CustomerController::class, 'new']);
$routes->post('customers/create', [CustomerController::class, 'create']);
$routes->get('customers/edit/(:num)', [CustomerController::class, 'edit']);
$routes->post('customers/update/(:num)', [CustomerController::class, 'update']);

// User Routes
$routes->get('users', [UserController::class, 'index']);
$routes->get('users/new', [UserController::class, 'new']);
$routes->post('users/create', [UserController::class, 'create']);
$routes->get('users/edit/(:num)', [UserController::class, 'edit']);
$routes->post('users/update/(:num)', [UserController::class, 'update']);
