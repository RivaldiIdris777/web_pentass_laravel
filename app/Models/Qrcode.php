<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    use HasFactory;

    protected $table = 'tbl_qrcode';

    protected $primaryKey = 'id';

    protected $fillable = ['gambar','nama_qrcode','url'];

    public $timestamps = true;
}
