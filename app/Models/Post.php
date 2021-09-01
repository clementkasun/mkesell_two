<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function Customer(){
        return $this->belongsTo(Customer::class);
    }
    
    public function SparePart(){
        return $this->hasOne(SparePart::class);
    }
    
    public function Vehicle(){
        return $this->hasOne(Vehicle::class);
    }
}
