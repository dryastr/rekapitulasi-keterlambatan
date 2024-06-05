<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'rombel_id', 
        'rayon_id', 
        'nis', 
        'name'
    ];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    public function late()
    {
        return $this->belongsTo(Late::class);
    }
}
