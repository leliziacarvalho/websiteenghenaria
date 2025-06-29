<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monografia extends Model
{
    use HasFactory;

    protected $table = 'monografia';

    protected $fillable = [
        'estudante_id',
        'titulun',
        'area_estudu',
        'palavras_chave',
        'resumu',
        'orientador_id',
        'co_orientador_id',
        'estadu',
        'dokumentu_path',
        'komentariu',
    ];

    public function estudante()
    {
        return $this->belongsTo(Estudante::class);
    }

    public function orientador()
    {
        return $this->belongsTo(Orientador::class, 'orientador_id');
    }

}
