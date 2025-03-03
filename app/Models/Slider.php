<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'tbl_slider';

    protected $fillable = ['gambar','nama_slider','slug','keterangan'];

    public $timestamps = true;

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/slider/' . $value),
        );
    }
}
