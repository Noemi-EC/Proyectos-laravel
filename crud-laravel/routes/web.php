<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $tasks = Task::latest()->paginate(5);
    return view('index', compact('tasks'));
    // return view('welcome');
});

// controlador de recursos ya tienen las rutas integradas solo hace falta conectarlo con el archivo de rutas
Route::resource('tasks', TaskController::class);
