<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'imagem',
    ];
    
    public function tarefas(): HasMany {
        return $this->hasMany(Tarefa::class);
    }

    public function user():BelongsToMany {
        return $this->belongsToMany(User::class)->using('ProjetoUser');
    }
}

