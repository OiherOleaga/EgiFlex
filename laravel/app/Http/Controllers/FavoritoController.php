<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    public function index()
    {
        $favoritos = Favorito::all();
        return view('favoritos.index', compact('favoritos'));
    }

    public function create()
    {
        return view('favoritos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'column_2' => 'required',
        ]);

        Favorito::create($request->all());

        return redirect()->route('favoritos.index');
    }

    public function show(Favorito $favorito)
    {
        return view('favoritos.show', compact('favorito'));
    }

    public function edit(Favorito $favorito)
    {
        return view('favoritos.edit', compact('favorito'));
    }

    public function update(Request $request, Favorito $favorito)
    {
        $request->validate([
            'column_2' => 'required',
        ]);

        $favorito->update($request->all());

        return redirect()->route('favoritos.index');
    }

    public function destroy(Favorito $favorito)
    {
        $favorito->delete();

        return redirect()->route('favoritos.index');
    }
}
