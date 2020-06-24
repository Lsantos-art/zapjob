<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $fillable = [
        'categoria',
        'hash',
        'titulo',
        'empresa',
        'tipo',
        'qtd',
        'local',
        'salario',
        'beneficios',
        'requisitos',
        'descricao',
        'contato',
        'whatsapp',
        'email',
        'periodo',
        'role',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
