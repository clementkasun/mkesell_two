<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use Illuminate\support\Facades\DB;

class DsDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $ds_divisions = [
        //     ['name' => 'Alawwa', 'district_id' => 1],
        //     ['name' => 'Bamunakotuwa', 'district_id' => 1],
        //     ['name' => 'Bingiriya', 'district_id' => 1],
        //     ['name' => 'Ehetuwewa', 'district_id' => 1],
        //     ['name' => 'Galgamuwa', 'district_id' => 1],
        //     ['name' => 'Ganewatta', 'district_id' => 1],
        //     ['name' => 'Giribawa', 'district_id' => 1],
        //     ['name' => 'Ibbagamuwa', 'district_id' => 1],
        //     ['name' => 'Katupotha', 'district_id' => 1],
        //     ['name' => 'Kobeigane', 'district_id' => 1],
        //     ['name' => 'Kotavehera', 'district_id' => 1],
        //     ['name' => 'Kuliyapitiya', 'district_id' => 1],
        //     ['name' => 'Kuliyapitiya', 'district_id' => 1],
        //     ['name' => 'Kurunegala', 'district_id' => 1],
        //     ['name' => 'Mahawa', 'district_id' => 1],
        //     ['name' => 'Mallawapitiya', 'district_id' => 1],
        //     ['name' => 'Maspotha', 'district_id' => 1],
        //     ['name' => 'Mawathagama', 'district_id' => 1],
        //     ['name' => 'Narammala', 'district_id' => 1],
        //     ['name' => 'Nikaweratiya', 'district_id' => 1],
        //     ['name' => 'Panduwasnuwara', 'district_id' => 1],
        //     ['name' => 'Pannala', 'district_id' => 1],
        //     ['name' => 'Polgahawela', 'district_id' => 1],
        //     ['name' => 'Polpithigama', 'district_id' => 1],
        //     ['name' => 'Rasnayakapura', 'district_id' => 1],
        //     ['name' => 'Rideegama', 'district_id' => 1],
        //     ['name' => 'Udubaddawa', 'district_id' => 1],
        //     ['name' => 'Wariyapola', 'district_id' => 1],
        //     ['name' => 'Weerambugedara', 'district_id' => 1],
        //     ['name' => 'Anamaduwa', 'district_id' => 2],
        //     ['name' => 'Arachchikattuwa', 'district_id' => 2],
        //     ['name' => 'Chilaw', 'district_id' => 2],
        //     ['name' => 'Dankotuwa', 'district_id' => 2],
        //     ['name' => 'Kalpitiya', 'district_id' => 2],
        //     ['name' => 'Madampe', 'district_id' => 2],
        //     ['name' => 'Mahakumbukkadawala', 'district_id' => 2],
        //     ['name' => 'Mahawewa', 'district_id' => 2],
        //     ['name' => 'Mundalama', 'district_id' => 2],
        //     ['name' => 'Nattandiya', 'district_id' => 2],
        //     ['name' => 'Nawagattegama', 'district_id' => 2],
        //     ['name' => 'Pallama', 'district_id' => 2],
        //     ['name' => 'Puttalam', 'district_id' => 2],
        //     ['name' => 'Vanathavilluwa', 'district_id' => 2],
        //     ['name' => 'Wennappuwa', 'district_id' => 2]
        // ];

        $ds_divisions = [
            ['name' => 'Alawwa',    'id' => 37, 'district_id' => 3],
            ['name' => 'Ambanpola', 'id' => 38, 'district_id' => 3],
            ['name' => 'Anamaduwa', 'id' => 39, 'district_id' => 4],
            ['name' => 'Arachchikattuwa',    'id' => 40, 'district_id' => 4],
            ['name' => 'Bamunakotuwa',       'id' => 41, 'district_id' => 3],
            ['name' => 'Bingiriya',          'id' => 42, 'district_id' => 3],
            ['name' => 'Chilaw',             'id' => 43, 'district_id' => 4],
            ['name' => 'Dankotuwa',          'id' => 44, 'district_id' => 4],
            ['name' => 'Ehetuwewa',          'id' => 45, 'district_id' => 3],
            ['name' => 'Galgamuwa',          'id' => 46, 'district_id' => 3],
            ['name' => 'Ganewatta',          'id' => 47, 'district_id' => 3],
            ['name' => 'Giribawa',           'id' => 48, 'district_id' => 3],
            ['name' => 'Ibbagamuwa',         'id' => 49, 'district_id' => 3],
            ['name' => 'Kalpitiya',          'id' => 50, 'district_id' => 4],
            ['name' => 'Karuwalagaswewa',    'id' => 51, 'district_id' => 4],
            ['name' => 'Kobeigane',          'id' => 52, 'district_id' => 3],
            ['name' => 'Kotavehera',         'id' => 53, 'district_id' => 3],
            ['name' => 'Kuliyapitiya East',  'id' => 54, 'district_id' => 3],
            ['name' => 'Kuliyapitiya West',  'id' => 55, 'district_id' => 3],
            ['name' => 'Kurunegala',         'id' => 56, 'district_id' => 3],
            ['name' => 'Madampe',            'id' => 57, 'district_id' => 4],
            ['name' => 'Mahakumbukkadawala', 'id' => 58, 'district_id' => 4],
            ['name' => 'Mahawewa',           'id' => 59, 'district_id' => 4],
            ['name' => 'Maho',               'id' => 60, 'district_id' => 3],
            ['name' => 'Mallawapitiya',      'id' => 61, 'district_id' => 3],
            ['name' => 'Maspotha',           'id' => 62, 'district_id' => 3],
            ['name' => 'Mawathagama',        'id' => 63, 'district_id' => 3],
            ['name' => 'Mundel',             'id' => 64, 'district_id' => 4],
            ['name' => 'Narammala',          'id' => 65, 'district_id' => 3],
            ['name' => 'Nattandiya',         'id' => 66, 'district_id' => 4],
            ['name' => 'Nawagattegama',      'id' => 67, 'district_id' => 4],
            ['name' => 'Nikaweratiya',       'id' => 68, 'district_id' => 3],
            ['name' => 'Pallama',            'id' => 69, 'district_id' => 4],
            ['name' => 'Panduwasnuwara East', 'id' =>  70, 'district_id' => 3],
            ['name' => 'Panduwasnuwara West', 'id' =>  71, 'district_id' => 3],
            ['name' => 'Pannala',             'id' =>  72, 'district_id' => 3],
            ['name' => 'Polgahawela',         'id' =>  73, 'district_id' => 3],
            ['name' => 'Polpithigama',        'id' =>  74, 'district_id' => 3],
            ['name' => 'Puttalam',            'id' =>  75, 'district_id' => 4],
            ['name' => 'Rasnayakapura',       'id' =>  76, 'district_id' => 3],
            ['name' => 'Rideegama',           'id' =>  77, 'district_id' => 3],
            ['name' => 'Udubaddawa',          'id' =>  78, 'district_id' => 3],
            ['name' => 'Vanathawilluwa',      'id' =>  79, 'district_id' => 4],
            ['name' => 'Wariyapola',          'id' =>  80, 'district_id' => 3],
            ['name' => 'Weerambugedara',      'id' =>  81, 'district_id' => 3],
            ['name' => 'Wennappuwa',          'id' =>  82, 'district_id' => 4],
        ];

        DB::table('ds_divisions')->insert($ds_divisions);
    }
}
