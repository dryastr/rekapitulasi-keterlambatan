<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'rayon'];

    public function pembimbingSiswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
