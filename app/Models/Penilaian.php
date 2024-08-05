<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'max_score_pilgan',
        'jumlah_soal',
        'essay_score',
        'siswa_id',
        'pilgan_score',
        'multiple_choice_score',
        'essay_score',
        'total_score',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
