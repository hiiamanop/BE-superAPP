<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'lifetime'];

    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }

    public function Assignment()
    {
        return $this->hasOne(Assignment::class);
    }
}
