<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    //Guarded es para evitar meter un campo a la bd
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //Relación uno a uno polimorfica
    public function image()
    {
        //imageable es el nombre del método que se creó en el modelo Imagen
        return $this->morphOne(Image::class, 'imageable');
    }
}
