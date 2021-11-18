<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model {

    use HasFactory;

    protected $fillable = array('part_used_in', 'part_category');

    public function Post() {
        return $this->belongsTo(Post::class);
    }

}
