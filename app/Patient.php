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
    public function products(): BelongsToMany{

        return $this->belongsToMany(Product::class)
            ->as('dados')
            ->withPivot('quantidadeDoada')
            ->withTimestamps();
    }


    public function addPaciente($dados){

        $this->create($dados);
    }

    public function allPaciente(){
        return $this->all();
    }


}
