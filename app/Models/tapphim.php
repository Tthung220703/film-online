<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tapphim extends Model
{
    use HasFactory;
    public $table = 'tapphim';
    public $timestamps = false;
    public function phim()
    {
        return $this->belongsTo(phim::class, 'phim_id', 'id');
    }
}
