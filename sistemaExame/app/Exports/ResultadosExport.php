<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Resultados;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultadosExport implements /*FromQuery, WithHeadings*/ FromView
{
   use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
   /* public function collection()
    {

        return Resultados::all();

    }*/
   /* public function headings(): array{
        return ["ID", "AVALIACAO_ID", "USER_ID", "PONTUAÇÃO", "STATUS" ];
    }*/
    public $qualificacoes;
    public function __construct($qualificacoes)
    {
        $this->qualificacoes= $qualificacoes;
    }
   /* public function query()
    {
        return Resultados::query()->whereIn('avaliacaos_id', $this->prova_id);

    }*/
    public function view(): View
    {
        return view('exports.resultados', ['qualificacoes'=>$this->qualificacoes]);
    }
}
