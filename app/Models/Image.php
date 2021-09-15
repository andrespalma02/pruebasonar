<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    //Relación polimorfica
    //El nombre del método tiene que ser el mismo nombre que en la migración

    public function imageable()
    {
        return $this->morphTo();
    }
}
