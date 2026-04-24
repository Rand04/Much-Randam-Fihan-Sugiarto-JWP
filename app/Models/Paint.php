<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paint extends Model
{
    protected $fillable = [
        'nama_cat','paint_type_id','jenis','warna',
        'harga','terjual','kualitas','ukuran','deskripsi'
    ];

    public function type()
    {
        return $this->belongsTo(PaintType::class, 'paint_type_id');
    }
}
