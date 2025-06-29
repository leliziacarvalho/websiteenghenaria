<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $table = 'estudante';

    protected $fillable = [
        'numeru_estudante',
        'naran',
        'generu',
        'data_moris',
        'email',
        'nim',
        'telefone',
        'departamentu_id',
    ];

    // Relasaun ba Departamentu
    public function departamentu()
    {
        return $this->belongsTo(Departamentu::class);
    }


    // Relasaun ba Monografia sira
    public function monografias()
    {
        return $this->hasMany(Monografia::class, 'estudante_id');
    }
}
