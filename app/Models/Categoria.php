<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Tarea;

class Categoria extends Model
{
    protected $fillable = ['user_id', 'nombre','color'];
    use HasFactory;

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
    public function usuario():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
