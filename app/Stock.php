<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stock extends Model
{


    protected $fillable = [
        'nome',
        'marca',
        'categoria',
        'descricaoProduto',
        'amount',

    ];

    //criando o relacinamento may to may entre as tabelas doadores e estoques
    public function donors(): BelongsToMany{
        return $this->belongsToMany(Donor::class);
    }

    public function patients(): BelongsToMany{
        return $this->belongsToMany(Patient::class);
    }

}
