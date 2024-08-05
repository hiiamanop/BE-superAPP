<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
