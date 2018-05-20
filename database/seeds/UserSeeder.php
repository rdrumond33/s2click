<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        foreach (range(1, 20) as $i) {
            $dados=[
                'name' => "Teste$i",
                'email'=> "Teste$i@hotmail.com",
                'password' =>123456
            ];
            DB::table("users")->insert($dados);
        }

    }
}
