<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $fillable = ['nombre', 'apellido', 'cel', 'correo'];
}
