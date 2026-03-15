<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //unicos campos que se pueden insertar o actualizar desde la API
    protected $fillable =[
        'title',
        'status',
        'description'
    ];
}
