<?php

namespace App\Http\Controllers;

use App\Models\HistorialSerie;
use Illuminate\Http\Request;

class HistorialSerieController extends Controller
{
    public function index()
    {
        $historialesSeries = HistorialSerie::all();
        return view('historiales_series.index', compact('historialesSeries'));
    }

    public function create()
    {
        return view('historiales_series.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_serie' => 'required|exists:series,id',
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        HistorialSerie::create($request->all());

        return redirect()->route('historiales_series.index');
    }

    public function show(HistorialSerie $historialSerie)
    {
        return view('historiales_series.show', compact('historialSerie'));
    }

    public function edit(HistorialSerie $historialSerie)
    {
        return view('historiales_series.edit', compact('historialSerie'));
    }

    public function update(Request $request, HistorialSerie $historialSerie)
    {
        $request->validate([
            'id_serie' => 'required|exists:series,id',
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        $historialSerie->update($request->all());

        return redirect()->route('historiales_series.index');
    }

    public function destroy(HistorialSerie $historialSerie)
    {
        $historialSerie->delete();

        return redirect()->route('historiales_series.index');
    }
}
