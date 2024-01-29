<?php

namespace App\Http\Controllers;

use App\Models\Voluntario;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VoluntarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voluntarios = Voluntario::latest()->paginate(5);
        return view('voluntario.index', ['voluntarios' => $voluntarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('voluntario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'edad' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'imagen' => 'required|image|max:2048'
        ]);

        $datosVoluntario = request()->all();

        if($request->hasFIle('imagen')){
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('voluntarios_uploads', 'public');
            $datosVoluntario['imagen'] = $rutaImagen;
            // $datosVoluntario['imagen'] = $request->file('imagen');
        }

        Voluntario::create($datosVoluntario);
        return redirect()->route('voluntario.index')->with('success', 'Nuevo voluntario registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voluntario $voluntario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $voluntario = Voluntario::findOrFail($id);
        return view('voluntario.edit', compact('voluntario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosVoluntario = request()->except(['_token', '_method']);

        if($request->hasFIle('imagen')){
            $voluntario = Voluntario::findOrFail($id);
            Storage::delete('public/'.$voluntario->imagen);
            $datosVoluntario['imagen'] = $request->file('imagen')->store('voluntarios_uploads', 'public');
        }

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'edad' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'imagen' => 'required'
        ]);

        Voluntario::where('id', '=', $id)->update($datosVoluntario);
        return redirect()->route('voluntario.index')->with('success', 'Voluntario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $voluntario = Voluntario::findOrFail($id);
        if(Storage::delete('public/'.$voluntario->imagen)){
            Voluntario::destroy($id);
        }
        return redirect()->route('voluntario.index')->with('success', 'Registro de voluntario eliminado con éxito');
    }
}
