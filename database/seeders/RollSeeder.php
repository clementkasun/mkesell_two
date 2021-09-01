<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use Illuminate\support\Facades\DB;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolls = [
            ['name' => 'Admin', 'level_id' => 1],
            ['name' => 'Data Entry', 'level_id' => 2],
        ];
        DB::table('rolls')->insert($rolls);
    }
}
