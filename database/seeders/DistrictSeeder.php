<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use Illuminate\support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ['id' => 3, 'district_name' => 'Kurunegala'],
            ['id' => 4, 'district_name' => 'Puttalam'],
        ];
        DB::table('districts')->insert($districts);
    }
}
