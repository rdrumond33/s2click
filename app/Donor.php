<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Donor extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
        'email',
        'cpfCnpj',
        'tipo'
    ];


    //criando o relacinamento may to may entre as tabelas doadores e estoques
    public function stocks(): BelongsToMany
    {
        return $this->belongsToMany(Stock::class);
    }
    public function addDonor($dados){

        $this->insert($dados);

    }

}
