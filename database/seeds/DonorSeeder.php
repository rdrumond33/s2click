<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Donor;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $i) {
            $dados=[
                'nome'=>"Doador$i",
                'endereco'=>"rua $i",
                'telefone' =>"3133333",
                'email'=>"Teste$i@hotmail.com",
                'cpfCnpj'=>"10102020$i",
                'tipo'=>'esporadico'
            ];

            DB::table('donors')->insert($dados);
        }

    }
}
