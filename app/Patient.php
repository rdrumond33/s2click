<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Patient extends Model
{
    protected $fillable = [
        'nome',
        'responsavel',
        'especiais',
        'necessidade',
        'receita',
    ];

    //criando o relacinamento may to may entre as tabelas doadores e estoques
    public function stocks(): BelongsToMany{
        return $this->belongsToMany(Stock::class);
    }
}
