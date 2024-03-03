<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;
use App\Models\Temporada;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class EpisodioController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $episodios = Episodio::query()
            ->whereHas('temporada.serie', function ($query) use ($search) {
                $query->where('titulo', 'LIKE', "%$search%");
            })
            ->orWhere('titulo', 'LIKE', "%$search%")
            ->orWhere('numero_episodio', 'LIKE', "%$search%")
            ->orWhere('duracion', 'LIKE', "%$search%")
            ->orWhere('sinopsis', 'LIKE', "%$search%")
            ->orWhere('fecha_estreno', 'LIKE', "%$search%")
            ->paginate(5);

        $episodios->appends(['search' => $search]);

        return view('episodios.index', compact('episodios'));
    }

    public function create()
    {
        $temporadas = Temporada::all();
        return view('episodios.create', compact('temporadas'));
    }

    public function store(Request $request)
    {
        if (empty($request->id_temporada) || empty($request->titulo) || empty($request->numero_episodio) || empty($request->duracion) || empty($request->sinopsis) || empty($request->fecha_estreno) || !$request->hasFile('archivo')) {
            return redirect()->route('episodios.index')->with('error', 'Por favor completa todos los campos y proporciona un archivo.');
        }

        $archivo = $request->file('archivo');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
        $archivo->move(public_path('media/episodios'), $nombreArchivo);

        $portada = $request->file('portada');
        $nombrePortada = time() . '_' . $portada->getClientOriginalName();
        $portada->move(public_path('media/portadas'), $nombrePortada);

        $episodio = Episodio::create([
            'id_temporada' => $request->id_temporada,
            'titulo' => $request->titulo,
            'numero_episodio' => $request->numero_episodio,
            'duracion' => $request->duracion,
            'sinopsis' => $request->sinopsis,
            'fecha_estreno' => $request->fecha_estreno,
            'archivo' => 'media/episodios/' . $nombreArchivo,
            'portada' => 'media/portadas/' . $nombrePortada,
        ]);

        return redirect()->route('episodios.index')->with('success', 'Episodio creado exitosamente.');
    }


    public function show(Episodio $episodio)
    {
        return view('episodios.show', compact('episodio'));
    }

    public function edit(Episodio $episodio)
    {
        $temporadas = Temporada::all();
        return view('episodios.edit', compact('episodio', 'temporadas'));
    }

    public function update(Request $request, $id)
    {
        if (empty($request->id_temporada) || empty($request->titulo) || empty($request->numero_episodio) || empty($request->duracion) || empty($request->sinopsis) || empty($request->fecha_estreno)) {
            return redirect()->route('episodios.index')->with('error', 'Por favor completa todos los campos obligatorios.');
        }

        $episodio = Episodio::findOrFail($id);

        if (!$request->hasFile('archivo') && !$episodio->archivo) {
            return redirect()->route('episodios.index')->with('error', 'Por favor selecciona un archivo.');
        }

        $episodio->id_temporada = $request->id_temporada;
        $episodio->titulo = $request->titulo;
        $episodio->numero_episodio = $request->numero_episodio;
        $episodio->duracion = $request->duracion;
        $episodio->sinopsis = $request->sinopsis;
        $episodio->fecha_estreno = $request->fecha_estreno;


        if ($request->hasFile('archivo')) {
            if ($episodio->archivo) {
                if (File::exists(public_path($episodio->archivo))) {
                    File::delete(public_path($episodio->archivo));
                }
            }
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('media/episodios'), $nombreArchivo);

            $episodio->archivo = 'media/episodios/' . $nombreArchivo;
        }

        if ($request->hasFile('portada')) {
            if ($episodio->portada) {
                if (File::exists(public_path($episodio->portada))) {
                    File::delete(public_path($episodio->portada));
                }
            }

            $portada = $request->file('portada');
            $nombrePortada = time() . '_' . $portada->getClientOriginalName();
            $portada->move(public_path('media/portadas'), $nombrePortada);

            $episodio->portada = 'media/portadas/' . $nombrePortada;
        }

        $episodio->save();

        return redirect()->route('episodios.index')->with('success', 'Episodio editado exitosamente.');
    }



    public function destroy(Episodio $episodio)
    {
        $archivo = $episodio->archivo;
        $portada = $episodio->portada;

        if ($archivo && $portada) {
            $rutaArchivo = public_path($archivo);
            $rutaPortada = public_path($portada);

            if (File::exists($rutaArchivo) && File::exists($rutaPortada)) {
                File::delete($rutaArchivo);
                File::delete($rutaPortada);
                $episodio->delete();
                return redirect()->route('episodios.index')->with('success', 'Episodio eliminado exitosamente.');
            } else {
                return redirect()->route('episodios.index')->with('error', 'No se encontró el archivo asociado.');
            }
        } else {
            return redirect()->route('episodios.index')->with('error', 'No se encontró el archivo asociado.');
        }
    }

    function episodios(Request $request) { return ClienteController::checkSession($request, function($request) {
        return ["episodios" => Episodio::where("id_temporada", $request["id"])->get()];
    });}

}
