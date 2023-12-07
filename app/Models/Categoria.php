<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['user_id', 'nombre','color'];
    use HasFactory;

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
