<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $fillable = array('post_title', 'price', 'additional_info', 'location', 'condition','post_type', 'main_image', 'image_one', 'image_two', 'image_three', 'image_four', 'image_five', 'vehicle_id', 'spare_part_id', 'cust_id');

    public function Customer() {
        return $this->belongsTo(Customer::class);
    }

    public function SparePart() {
        return $this->hasOne(SparePart::class);
    }

    public function Vehicle() {
        return $this->hasOne(Vehicle::class);
    }

}
