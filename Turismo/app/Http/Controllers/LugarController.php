<?php

namespace App\Http\Controllers;

use App\Models\lugar;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $lugares = lugar::latest()->paginate(2);
        return view('index', ['lugares' => $lugares]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'url' => 'required'
        ]);
        lugar::create($request->all());
        return redirect()->route('lugars.index')->with('success', 'Nueva tarjeta creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(lugar $lugar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lugar $lugar): View
    {
        return view('editar', ['lugar' => $lugar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lugar $lugar): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'url' => 'required'
        ]);
        // dd($request->all());
        $lugar->update($request->all());
        return redirect()->route('lugars.index')->with('success', 'Nueva tarjeta actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lugar $lugar)
    {
        // dd($lugar);
        $lugar->delete();
        return redirect()->route('lugars.index')->with('success', 'Tarjeta eliminada exitosamente');
    }
}
