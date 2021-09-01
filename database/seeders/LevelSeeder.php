<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use Illuminate\support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolls = [
            ['id' => 1, 'name' => 'level_one'],
            ['id' => 2, 'name' => 'level_two'],
        ];
        DB::table('levels')->insert($rolls);
    }
}
