<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientador extends Model
{
    use HasFactory;

    protected $table = 'orientador';

    protected $fillable = [
        'naran',
        'email',
        'telefone',
        'departamentu_id',
    ];

    // Relasaun ba Departamentu
    public function departamentu()
    {
        return $this->belongsTo(Departamentu::class);
    }

    // Relasaun ba Monografia hodi orientador utama
    public function monografias()
    {
        return $this->hasMany(Monografia::class, 'orientador_id');
    }

}
