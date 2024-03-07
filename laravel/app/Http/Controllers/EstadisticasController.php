<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Models\HistorialSerie;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class EstadisticasController extends Controller
{
    public function index()
    {
        $resultados = DB::select("
        SELECT
            s.Titulo,
            COUNT(hs.id) AS TotalUsuarios
            FROM
                Series s
                JOIN Historial_Series hs ON s.id = hs.serie_id
            GROUP BY
                s.Titulo;
        ");

        $labels = [];
        $data = [];

        foreach ($resultados as $resultado) {
            $labels[] = $resultado->Titulo;
            $data[] = $resultado->TotalUsuarios;
        }

        $chart1 = LarapexChart::barChart()
            ->setTitle('Usuarios Viendo/Siguiendo Series')
            ->setXAxis($labels)
            ->addData('Usuarios', $data)
            ->setColors(['#334FFF']);

        return view('estadisticas.index', compact('chart1'));
    }
}
