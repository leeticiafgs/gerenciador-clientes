<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras'; // Nome da tabela no banco de dados

    protected $fillable = [
        'data_compra',
        'valor',
        'descricao'
        // Outros campos da tabela "compras"
    ];

    // Relacionamentos, se houver
    // Exemplo: uma compra pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relação com a model Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
