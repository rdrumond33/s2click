<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserve';

    protected $fillable = [

        'dataReserva',
        'idPaciente',
        'horaReserva',
        'Responsavel',
        'quantidade',
        'status'

    ];
}
