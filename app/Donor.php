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
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function addDonor($dados){

        $this->insert($dados);

    }

    public function  Relacionamento($doador,$id_product){

        $doador->$this->products()->attach($id_product);
        //()->attach($id_product);

    }


    public function getDoadores(){
        return Donor::all();
    }
    public function qualDoador($id){
        return Donor::find($id);
    }



}
