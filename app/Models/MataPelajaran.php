<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = ['name_mapel'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'mapel_id');
    }

    public function guruMapel()
    {
        return $this->hasMany(GuruMapel::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
