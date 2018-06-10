<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'nome'=>$faker->name,
        'endereco'=>$faker->address,
        'telefone'=>3333333,
        'email'=>$faker->unique()->email,
        'cpf'=>$faker->unique()->postcode,
        'tipo'=>'esporadico',
    ];
});
