<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = ['assignment_id', 'question', 'type'];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function multipleChoices()
    {
        return $this->hasMany(MultipleChoice::class);
    }

    public function correctAnswer()
    {
        return $this->hasOne(MultipleChoice::class)->where('is_correct', true);
    }

    public function lembarJawaban()
    {
        return $this->hasMany(LembarJawaban::class);
    }
}
