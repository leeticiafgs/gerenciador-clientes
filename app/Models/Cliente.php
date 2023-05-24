<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereço'
    ];

    protected $dates = ['data_nascimento'];

    // Relação com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
