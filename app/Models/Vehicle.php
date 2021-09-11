<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {

    use HasFactory;

    protected $fillable = array( 'vehicle_type',
                                 'vehicle_condition',
                                 'vehicle_make_id',
                                 'model',
                                 'start_type',
                                 'manufactured_year',
                                 'price',
                                 'on_going_lease',
                                 'transmission',
                                 'fuel_type',
                                 'engine_capacity',
                                 'millage',
                                 'isAc',
                                 'isPowerSteer',
                                 'isPowerMirroring',
                                 'isPowerWindow',
                                 'additional_info');
    public function Post() {
        return $this->belongsTo(Post::class);
    }

    public function VehicleMake() {
        return $this->belongsTo(VehicleMake::class);
    }

}
