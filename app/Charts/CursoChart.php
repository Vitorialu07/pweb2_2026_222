<?php

namespace App\Charts;
use App\Models\Curso;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class CursoChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $cursos=Curso::all();
        $qtdTurmas=[];
        $nomeCursos=[];
        foreach ($cursos as $item){
            $nomeCursos[]=$item->nome;
            $qtdTurmas[]=$item->turmas->count();
        }
        return (new LarapexChart)->pieChart()
            ->setTitle('Cursos disponiveis ')
            ->setSubtitle('Semestre 2026.2')
            ->addData([40, 50, 30])
            ->setLabels(['TDS', 'SER', 'TI']);
    }
    
}
