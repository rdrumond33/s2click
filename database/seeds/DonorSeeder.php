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
        factory(App\Donor::class, 50)->create();
    }

}

