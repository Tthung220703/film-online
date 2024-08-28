<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    public $table = 'danhmuc';
    public $timestamps = false;
    use HasFactory;
    public function phim(){
        return $this->hasMany(phim::class);
    }
}
