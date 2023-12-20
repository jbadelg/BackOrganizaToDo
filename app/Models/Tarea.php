<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'nombre',
        'user_id',
        'tipoTarea',
        'descripcion',
        'estadoTarea',
        'categoria_id',
        'fechaInicio',
        'fechaVencimiento',
        'duracion',
        'valor',
        'recurrente',
        'periodicidadRecurrencia',
        'subtarea_id',
        'amigo_id'
    ];
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function amigo()
    {
        return $this->belongsTo(Amigo::class);
    }
}
