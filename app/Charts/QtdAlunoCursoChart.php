<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class QtdAlunoCursoChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $qtdAlunoPorCurso= DB::table('matriculas')->join('cursos', 'cursos.id', '=', 'matriculas.curso_id')
        ->select('cursos.nome', DB::raw('count(1) asqtd_alunos'))
        ->grupoBy('cursos.nome')
        ->orderBy('qtd_alunos', 'desc')
        ->get();


        
        $qtdAlunos=[];
        $nomeCursos=[];

        foreach ($qtdAlunoPorCurso as $item){
            $nomeCursos[]=$item->nome;
            $qtdTurmas[]=$item->qtd_alunos;
        }
        return (new LarapexChart)->pieChart()
            ->setTitle('Alunos matriculados ')
            ->setSubtitle('Semestre 2026.2')
            ->addData([40, 50, 30])
            ->setLabels(['TDS', 'SER', 'TI']);
    }
        
}
