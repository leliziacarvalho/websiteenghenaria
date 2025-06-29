<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentu extends Model
{
    use HasFactory;

    protected $table = 'departamentu';

    protected $fillable = [
        'naran',
        'deskrisaun',
    ];

    // Relasaun ba Orientador sira
    public function orientadors()
    {
        return $this->hasMany(Orientador::class, 'departamentu_id');
    }

    // Relasaun ba Estudante sira
    public function estudantes()
    {
        return $this->hasMany(Estudante::class, 'departamentu_id');
    }
}
