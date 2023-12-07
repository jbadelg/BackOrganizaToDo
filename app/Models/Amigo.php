<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amigo extends Model
{
    protected $fillable = [
        'user_id',
        'nombre', 
        'email'
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function amigo()
    {
        return $this->hasMany(Amigo::class);
    }
}
