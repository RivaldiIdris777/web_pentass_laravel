<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'tbl_peserta';

    protected $primaryKey = 'id';

    protected $fillable = ['file_ktp_suket','lomba_id','nama','no_peserta','slug','no_wa','asal_sekolah','status','url','keterangan','setuju_syarat_ketentuan','lomba'];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class);
    }

    public $timestamps = true;
    
}
