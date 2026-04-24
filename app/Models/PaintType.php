<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaintType extends Model
{
    protected $fillable = ['name'];

    public function paints()
    {
        return $this->hasMany(Paint::class);
    }
}
