<?php

namespace App\Models;

use App\Http\Controllers\tapphimController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phim extends Model
{
    public $table = 'phim';
    public $timestamps = false;
    use HasFactory;
    public function danhmuc(){
        return $this->belongsTo(danhmuc::class,'danhmuc_id', 'id');
    }
    public function theloai(){
        return $this->belongsTo(theloai::class,'theloai_id', 'id');
    }
    public function quocgia(){
        return $this->belongsTo(quocgia::class,'quocgia_id', 'id');
    }
    public function tapphim(){
        return $this -> hasMany(tapphim::class, 'phim_id', 'id');
    }
}
