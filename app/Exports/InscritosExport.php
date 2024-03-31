<?php

namespace App\Exports;

use App\Models\Curso;
use App\Models\Inscricao;
use Maatwebsite\Excel\Concerns\FromCollection;

class InscritosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscricao::all();
    }
}
