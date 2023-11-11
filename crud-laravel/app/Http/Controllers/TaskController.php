<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // latest extrae desde el último hasta el primero y las almacena en tasks
        // $tasks = Task::latest()->get();
        // paginate muestra la cantidad de elementos que se moestrará, es un método de bootstrap
        $tasks = Task::latest()->paginate(5);
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // el método create se utiliza para mostrar el formulario
        // el método store para ejecutar la lógica para almacenar
        // el uevo registro con los datos correspondientes
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // imprime toda la información que hay en la $request
        // dd($request->all());
        // validación:
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        Task::create($request->all());
        // después de crear la nueva tarea redirígenos al index
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        // view(vista, data)
        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada con éxito');
    }
}
