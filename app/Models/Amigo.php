<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Amigo extends Model
{
    protected $fillable = [
        'user_id',
        'nombre',
        'email'
    ];
    use HasFactory;
    public function usuario():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function amigo()
    {
        return $this->hasMany(Amigo::class);
    }
}
