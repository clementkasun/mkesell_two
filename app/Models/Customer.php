<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    use HasFactory;

    protected $fillable = array('cust_name', 'phone_number', 'email', 'city', 'user_id');

    public function User() {
        return $this->hasOne(User::class);
    }

    public function Post() {
        return $this->hasMany(Post::class);
    }

}
