<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    protected $fillable = ['siswa_id', 'mapel_id', 'jenis_penilaian_id', 'nilai', 'tahun_ajaran_id'];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function jenisPenilaian()
    {
        return $this->belongsTo(JenisPenilaian::class, 'jenis_penilaian_id');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}