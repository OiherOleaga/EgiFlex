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
        //Series
        $resultados = DB::select("
        SELECT
            s.Titulo,
            COUNT(hs.id) AS TotalUsuarios
            FROM
                series s
                JOIN historial_series hs ON s.id = hs.serie_id
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
            ->setTitle('Series mas populares')
            ->setXAxis($labels)
            ->addData('Usuarios', $data)
            ->setColors(['#730DD9']);


        //Peliculas
        $resultados2 = DB::select("
        SELECT
            p.Titulo,
            COUNT(hp.id) AS TotalUsuarios
            FROM
                peliculas p
                JOIN historial_peliculas hp ON p.id = hp.id_pelicula
            GROUP BY
                p.Titulo;
        ");

        $labels2 = [];
        $data2 = [];

        foreach ($resultados2 as $resultado) {
            $labels2[] = $resultado->Titulo;
            $data2[] = $resultado->TotalUsuarios;
        }
        

        $chart2 = LarapexChart::barChart()
            ->setTitle('Peliculas mas populares')
            ->setXAxis($labels2)
            ->addData('Usuarios', $data2)
            ->setColors(['#730DD9']);


        return view('estadisticas.index', compact('chart1', 'chart2'));
    }
}
