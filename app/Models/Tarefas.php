<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarefas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'projeto_id',
        'estado_id',
        'description',
    ];

    public function tarefas(): HasMany {
        return $this->hasMany(Tarefa::class);
    }

    public function user(): HasMany {
        return $this->hasMany(User::class);
    }

    public function projeto(): BelongsTo
    {
        return $this->belongsTo(Projeto::class);
    }
}

