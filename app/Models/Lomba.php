<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $table = 'tbl_lomba';

    protected $primaryKey = 'id';

    protected $fillable = ['nama_lomba', 'slug', 'gambar', 'keterangan', 'tanggal_pendaftaran', 'tanggal_perlombaan', 'pic'];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'id', 'lomba_peserta');
    }
}
