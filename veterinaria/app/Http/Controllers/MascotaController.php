<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MascotaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascota::latest()->paginate(5);
        return view('mascota.index', ['mascotas' => $mascotas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'edad' => 'required',
            'imagen' => 'required',
            'tamanio' => 'required',
            'genero' => 'required|image|max:2048'
        ]);

        $datosMascota = request()->all();

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('uploads/Mascotas', 'public');
            $datosMascota['imagen'] = $rutaImagen;

        }

        Mascota::create($datosMascota);
        return redirect()->route('mascota.index')->with('success', 'Nueva mascota registrada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $mascota = Mascota::findOrFail($id);
        return view('mascota.edit', compact('mascota'));
        // return view('mascota.edit', ['mascota' => $mascota], ['modo' => 'Editar']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosMascota = request()->except(['_token', '_method']);

        if($request->hasFile('imagen')){
            $mascota = Mascota::findOrFail($id);
            Storage::delete('public/'.$mascota->imagen);
            $datosMascota['imagen'] = $request->file('imagen')->store('uploads', 'public');
         }

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'edad' => 'required',
            'imagen' => 'required',
            'tamanio' => 'required',
            'genero' => 'required'
        ]);
        // $mascota->update($request->all());
        Mascota::where('id', '=', $id)->update($datosMascota);
        return redirect()->route('mascota.index')->with('success', 'Registro de mascota actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        if(Storage::delete('public/'.$mascota->imagen)){
            Mascota::destroy($id);
        }
        return redirect()->route('mascota.index')->with('success', 'Registro de mascota eliminado con éxito');
    }
}
