<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarJawaban extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'soal_id',
        'multiple_choices_id',
    ];

    /**
     * Get the soal that owns the LembarJawaban.
     */
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    /**
     * Get the multiple choice that owns the LembarJawaban.
     */
    public function multipleChoice()
    {
        return $this->belongsTo(MultipleChoice::class);
    }
}
