<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    public $timestamps=true;

    protected $fillable = [
        'id',
        'nome',
        'marca',
        'categoria',
        'descricaoProduto',
        'amount',
        'beforeAmount'

    ];

    protected $hidden = [
        'remember_token',
    ];

    //criando o relacinamento may to may entre as tabelas doadores e estoques
    public function donors(){

        return $this->belongsToMany(Donor::class);

    }

    public function patients(){

        return $this->belongsToMany(Patient::class)
            ->as('dados')
            ->withPivot('quantidadeDoada')
            ->withTimestamps();

    }


    public function addProduct($dados){

        $this->create($dados);

    }





}
