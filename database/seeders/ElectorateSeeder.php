<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use Illuminate\support\Facades\DB;

class ElectorateSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $electorate_divisions = [
            ['id' => 1, 'name' => 'N/A', 'district_id' => 3],
            ['id' => 2, 'name' => 'N/A', 'district_id' => 4],
        ];

        DB::table('electorate_divisions')->insert($electorate_divisions);
    }

}
