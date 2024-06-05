<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Late extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_time_late',
        'information',
        'bukti',
    ];

    public function siswa()
    {
        return $this->belongsTo(Student::class);
    }

    public function rekapitulasi()
    {
        return $this->hasOne(Late::class, 'id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'name', 'name');
    }

    public static function countLateByStudent($name)
    {
        return self::where('name', $name)->count();
    }
}
