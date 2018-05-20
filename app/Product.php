<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{

    protected $fillable = [
        'id',
        'nome',
        'marca',
        'categoria',
        'descricaoProduto',
        'amount',

    ];
    protected $hidden =['_token'];

    //criando o relacinamento may to may entre as tabelas doadores e estoques
    public function donors():BelongsToMany{

        return $this->belongsToMany(Donor::class);

    }


    public function addProduct($dados){

        $this->insert($dados);

    }





}
