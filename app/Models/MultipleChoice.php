<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleChoice extends Model
{
    use HasFactory;

    protected $fillable = ['soal_id', 'answer', 'is_correct'];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    public function lembarJawaban()
    {
        return $this->hasMany(LembarJawaban::class);
    }
}
