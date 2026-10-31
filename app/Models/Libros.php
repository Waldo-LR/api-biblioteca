<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Libros extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = [
        'autor_id',
        'titulo',
        'isbn',
        'anio_publicacion',
        'precio',
    ];

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autores::class, 'autor_id');
    }
}