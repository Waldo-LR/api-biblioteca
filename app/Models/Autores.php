<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Autores extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $fillable = [
        'nombres',
        'nacionalidad',
        'email',
    ];

    public function libros(): HasMany
    {
        return $this->hasMany(Libros::class, 'autor_id');
    }
}