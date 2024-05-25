<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'id',
        'npm',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'kota_id',
        'prodi_id',
        'url_foto'
    ];
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
}
