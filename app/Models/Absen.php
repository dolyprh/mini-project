<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = [
        'id_kelas',
        'id_materi',
        'id_asisten',
        'teaching_role',
        'date',
        'start',
        'id_code',
    ];
    
}
